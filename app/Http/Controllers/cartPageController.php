<?php

namespace App\Http\Controllers;

use App\Models\Ims\Brand;
use App\Models\Ims\ItemCode;
use Illuminate\Http\Request;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use App\Models\Ims\PurchaseOrder;
use App\Models\Ims\PurchaseOrderItem;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class cartPageController extends Controller
{
    public function index(){
        $Brands = Brand::all();
        return view('cart.index',compact(['Brands']));
    }

    public function shop(){
        $ItemCodes = ItemCode::all();
        $StockItem = StockItem::all();
        return view('cart.pages.shop.index',compact(['ItemCodes','StockItem']));
    }

    public function cart(){
        return view('cart.pages.cart.index');
    }

    public function categories($name){
        $brand = Brand::where('slug',$name)->firstorfail();
        $ItemCodes = ItemCode::where('brand_id',$brand->id)->get();
        return view('cart.pages.shop.index',compact(['ItemCodes']));
    }

    public function brandSelect($name){
        $brand = Brand::where('slug',$name)->firstorfail();
        $ItemCodes = ItemCode::where('brand_id',$brand->id)->get();
        return view('cart.pages.shop.index',compact(['ItemCodes']));
    }

    public function checkout(){
        if(Auth::check()){
            return view('cart.pages.checkout.index');
        }else{
            return redirect()->route('cart')->withStatus(__('You need to Login or Register to continue'));
        }

    }

    public function productDetail($id){
        $ItemCode = ItemCode::findorFail($id);
        $Brand = Brand::findOrFail($ItemCode->brand_id);
        $stockItem = StockItem::where('item_code_id',$id)->get();
        return view('cart.pages.productDetail.index',compact(['ItemCode','Brand','stockItem']));
    }

    public function addToCart(Request $request){

        $stockItem = StockItem::where('id',$request->stockItem_id)->first();

        $name = $stockItem->itemCode->name;
        $img = $stockItem->itemCode->thumbnail_url;
        $quantity = $request->quantity;
        $Price = $stockItem->selling_price * $quantity;
        $colorSize = $stockItem->itemCodeColor->color. '/'.$stockItem->itemCodeSize->size;
        $id = $request->stockItem_id;

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id => [
                    'id' => $id,
                    'name' => $name,
                    'img' => $img,
                    'price' => $Price,
                    'quantity' => $quantity,
                    'colorSize' => $colorSize,
                ]
            ];
        }
        elseif(isset($cart[$id])) {
 
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
 
        }else{
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'img' => $img,
                'price' => $Price,
                'quantity' => $quantity,
                'colorSize' => $colorSize,
            ];
        }

        session()->put('cart', $cart);

        //$request->session()->flush();

        return Redirect::back();
    }

    public function itemRemove($id){

        //get the session
        $cart = session()->get('cart');
        $total = session()->get('total');

        //minimizing the total for removing the item
        $total = $total - $cart[$id]['price'];
        session()->put('total', $total);

        //removing the item
        unset($cart[$id]);
        session()->put('cart', $cart);
        return Redirect::back();
    }

    public function purchase(Request $request){

        $request->validate([
            'customer_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'delivery_address'=>['required', 'string', 'max:255'],
            'contact'=>'required',
            'remarks'=>'required',
        ]);

        $order = PurchaseOrder::create([
            'customer_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'delivery_address' => $request->delivery_address,
            'contact' => $request->contact,
            'remarks' => $request->remarks,
        ]);

        $cart = session()->get('cart');
        $total = session()->get('total');

        foreach($cart as $c){

            $stockItem = StockItem::where('id',$c['id'])->first();

            PurchaseOrderItem::create([
                'purchase_order_id' => $order->id,
                'item_code_id' => $stockItem->item_code_id,
                'item_code_color_id' => $stockItem->item_code_color_id,
                'item_code_size_id' => $stockItem->item_code_size_id,
                'qty' => $c['quantity'],
                'cost' => $stockItem->cost * $c['quantity'],
                'discount' => 0,
                'selling_price' => $c['price'],
            ]);

            unset($cart[$c['id']]);
            session()->put('cart', $cart);
        }

        $request->session()->forget('total');

        return Redirect::back();
    }
}
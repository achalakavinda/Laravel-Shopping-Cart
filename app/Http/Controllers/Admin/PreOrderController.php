<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use App\Models\Ims\PurchaseOrder;
use App\Models\Ims\PurchaseOrderItem;
use App\Models\Ims\Invoice;
use App\Models\Ims\InvoiceItem;
use App\Models\Ims\ItemCodeColor;
use App\Models\Ims\ItemCodeSize;

class PreOrderController extends Controller
{
    public function index(){
        
        $PurchaseOrder = PurchaseOrder::all();
        return view('admin.pages.preOder.index',compact('PurchaseOrder'));
    }

    public function deliver($id){
        
        $order = PurchaseOrder::findorfail($id);
        $orderItems = PurchaseOrderItem::where('purchase_order_id',$order->id)->get();

        $order->status = "Delivered";
        $order->save();

        $total = 0;
        foreach($orderItems as $item){
            $total = $total + $item->selling_price;
        }

        
        $invoice = Invoice::create([
            'customer_id' => $order->customer_id,
            'purchase_order_id' => $order->id,
            'customer_name' => $order->customer_name,
            'email' => $order->email,
            'contact' => $order->contact,
            'delivery_address' => $order->delivery_address,
            'remarks' => $order->remarks,
            'sum' => $total,
        ]);

        foreach($orderItems as $item){
            
            InvoiceItem::create([
                'invoice_item_id' => $invoice->id,
                'purchase_order_id' => $order->id,
                'purchase_order_item_id' => $item->id,
                'item_code_id' => $item->item_code_id,
                'item_color_id' => $item->item_code_color_id,
                'item_size_id' => $item->item_code_size_id,
                'qty' => $item->qty,
                'cost' => $item->cost,
                'discount' => 0,
                'selling_price' => $item->selling_price,
            ]);
        }
        return redirect()->route('preorder')->withStatus(__('You have successfully delivered the items'));
    }

    public function show($id){
        $order = PurchaseOrder::findorfail($id);
        $orderItems = PurchaseOrderItem::where('purchase_order_id',$order->id)->get();
        $colors = ItemCodeColor::all();
        $sizes = ItemCodeSize::all();

        return view('admin.pages.preOder.show',compact('order','orderItems','colors','sizes'));
    }

    public function update(Request $request){

        $items = $request->id;
        $colors = $request->item_code_color_id;
        $sizes = $request->item_code_size_id;
        $qty = $request->quantity;

        for($count = 0; $count < count($items); $count++){
            
            $orderItem = PurchaseOrderItem::findorfail($items[$count]);
            $orderItem->item_code_color_id = $colors[$count];
            $orderItem->item_code_size_id = $sizes[$count];
            $orderItem->qty = $qty[$count];
            $orderItem->save();

        }

        return redirect()->route('preorder')->withStatus(__('You have successfully updated the items'));
    }
}
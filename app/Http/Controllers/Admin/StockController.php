<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ims\ItemCode;
use App\Models\Ims\ItemCodeColor;
use App\Models\Ims\ItemCodeSize;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockItem = StockItem::all();
        return view('admin.pages.stock.index',compact('stockItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ItemCode::all();
        $colors = ItemCodeColor::all();
        $sizes = ItemCodeSize::all();
        
        return view('admin.pages.stock.create',compact('products','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code_id'=>'required',
            'item_code_color_id'=>'required',
            'item_code_size_id'=>'required',
            'open_qty'=>'required',
            'cost'=>'required',
            'selling_price'=>'required',
        ]);
        
        $today = Carbon::today()->toDateString();
        $stock = Stock::where('code',$today)->first();
        if(!$stock){
            $stock = Stock::create([
                'code' => $today,
                'user_id' => auth()->user()->id,
            ]);
            $stockID = $stock->id;
        }
        
        StockItem::create([
            'stock_id' => $stock->id,
            'item_code_id' => $request->item_code_id,
            'item_code_color_id' => $request->item_code_color_id,
            'item_code_size_id' => $request->item_code_size_id,
            'open_qty' => $request->open_qty,
            'remain_qty' => $request->open_qty,
            'cost' => $request->cost,
            'selling_price' => $request->selling_price,
        ]);

        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
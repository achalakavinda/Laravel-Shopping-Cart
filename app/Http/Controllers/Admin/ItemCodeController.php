<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class ItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ItemsCodes = ItemCode::all();
        return view('admin.pages.item-code.index',compact('ItemsCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.pages.item-code.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->image);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'unit_cost'=>'required',
            'selling_price'=>'required',
            'image'=>'required|image',
            'brand_id'=>'required',
        ]);

        $thumbnail_url = null;

        $product = ItemCode::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'unit_cost'=>$request->unit_cost,
            'selling_price'=>$request->selling_price,
            'brand_id'=>$request->brand_id
        ]);

        $image = $request->file('image');
        $Store = Storage::put('/images/system/products/'.$product->id.'/', $image);

        if($Store){
            $product->thumbnail_url = '/storage/'.$Store;
            $product->save();
        }
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
        $product = ItemCode::findorfail($id);

        return view('admin.pages.item-code.show',compact(['product']));
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
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'unit_cost'=>'required',
            'selling_price'=>'required',
            'image'=>'required|image'
        ]);

        $thumbnail_url = null;

        $product = ItemCode::findorfail($id);


        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_cost = $request->unit_cost;
        $product->selling_price = $request->selling_price;
        $product->save();

        $image = $request->file('image');
        Storage::deleteDirectory('/images/system/products/'.$product->id.'');
        $Store = Storage::put('/images/system/products/'.$product->id.'', $image);

        if($Store){
            $product->thumbnail_url = '/storage/'.$Store;
            $product->save();
        }
        return Redirect::back();
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

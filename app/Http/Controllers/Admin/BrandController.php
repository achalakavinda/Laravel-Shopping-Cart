<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ims\Brand;
use Faker\Provider\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brands = Brand::all();
        return view('admin.pages.brand.index',compact('Brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.create');
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
            'name'=>'required',
            'file'=>'required',
        ]);

        $img_url = null;

        $Brand = Brand::create([
            'parent_id'=>null,
            'level'=>0,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'description'=>$request->description
        ]);

        $image = $request->file('file');
        $Store = Storage::put('/images/system/brands/'.$Brand->id.'/', $image);

        if($Store){
            $Brand->img_url = '/storage/'.$Store;
            $Brand->save();
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
        $Brand = Brand::findorfail($id);

        return view('admin.pages.brand.show',compact(['Brand']));
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
        ]);

        $Brand = Brand::findorfail($id);
        $Brand->name = $request->name;
        $Brand->slug = Str::slug($request->name, '-');
        $Brand->description = $request->description;
        $Brand->save();

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

<?php

namespace App\Http\Controllers;

use App\ProductBanner;
use Illuminate\Http\Request;

class ProductBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductBanner  $productBanner
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBanner $productBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductBanner  $productBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBanner $productBanner)
    {
        return view('admin.product.banner.edit',['productBanner'=> $productBanner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductBanner  $productBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBanner $productBanner)
    {
        $this->validate($request, [
            'banner_headline' => 'required',
            'banner_text' => 'required',
            'button1_text' => 'required',
            'button1_link' => 'required',
            'button2_text' => 'required',
            'button2_link' => 'required',
        ]);
        $image1=$request->file('background_image');
        if(!is_null($image1)){
            unlink($productBanner->background_image);
            $image = $request->file('background_image');
            $destinationPath = 'img/product/background/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath_background_image = $destinationPath.$uniqueName;

        }
        else{
            $originalPath_background_image = $productBanner->background_image;
        }

        $image2=$request->file('product_icon');
        if(!is_null($image2)){
            unlink($productBanner->product_icon);
            $image = $request->file('product_icon');
            $destinationPath = 'img/product/icon/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath_product_icon = $destinationPath.$uniqueName;
        }
        else{
            $originalPath_product_icon = $productBanner->product_icon;
        }

        $data_banner=[
            'banner_headline' =>  $request->banner_headline,
            'banner_text' => $request->banner_text,
            'button1_text' => $request->button1_text,
            'button1_link' => $request->button1_link,
            'button2_text' => $request->button2_text,
            'button2_link' => $request->button2_link,
            'background_image' => $originalPath_background_image,
            'product_icon' => $originalPath_product_icon,
        ];
        $productBanner->update($data_banner);

        session()->flash('success', 'Successfully Updated');

        return redirect('/products/'. $productBanner->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductBanner  $productBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBanner $productBanner)
    {
        //
    }
}

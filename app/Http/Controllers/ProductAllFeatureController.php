<?php

namespace App\Http\Controllers;

use App\ProductAllFeature;
use Illuminate\Http\Request;

class ProductAllFeatureController extends Controller
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
     * @param  \App\ProductAllFeature  $productAllFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAllFeature $productAllFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAllFeature  $productAllFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAllFeature $productAllFeature)
    {
        return view('admin.product.all_feature.edit',['productAllFeature'=>$productAllFeature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAllFeature  $productAllFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAllFeature $productAllFeature)
    {
        $this->validate($request, [
            'feature_headline' => 'required',
        ]);
       
        $data_feature=[
            'feature_headline' =>  $request->feature_headline,
        ];
        $productAllFeature->update($data_feature);

        session()->flash('success', 'Successfully Updated');

        return redirect('/products/'. $productAllFeature->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAllFeature  $productAllFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAllFeature $productAllFeature)
    {
        //
    }
}

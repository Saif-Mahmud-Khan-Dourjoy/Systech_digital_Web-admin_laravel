<?php

namespace App\Http\Controllers;

use App\ProductFeature;
use Illuminate\Http\Request;

class ProductFeatureController extends Controller
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
        return view('admin.product.product_feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'feature_subtext' => 'required', 
            'feature_headtext' => 'required', 
            'feature_icon' => 'required|mimes:jpeg,bmp,png,jpg', 
        ]);
        
        $image = $request->file('feature_icon');
        $destinationPath = 'img/product/icon/';
        $originalFile = $image->getClientOriginalName();
        $uniqueName = date("Y-m-d").time().$originalFile;
        $image->move($destinationPath, $uniqueName);
        $originalPath = $destinationPath.$uniqueName;
        $data_product=[
            'product_all_feature_id' => $request->product_all_feature_id,
            'feature_subtext' => $request->feature_subtext,
            'feature_headtext' => $request->feature_headtext,
            'feature_icon' => $originalPath,
        ];
        $productFeature = ProductFeature::create($data_product);

        session()->flash('success', 'Successfully Added');
        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFeature $productFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFeature $productFeature)
    {
        return view('admin.product.product_feature.edit',['productFeature'=> $productFeature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFeature $productFeature)
    {
        $this->validate($request, [
            'feature_subtext' => 'required', 
            'feature_headtext' => 'required', 
            'feature_icon' => 'mimes:jpeg,bmp,png,jpg', 
        ]);
        $image=$request->file('feature_icon');
        if(!is_null($image)){
            unlink($productFeature->feature_icon);
            $image = $request->file('feature_icon');
            $destinationPath = 'img/product/icon/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'feature_subtext' => $request->feature_subtext,
                'feature_headtext' => $request->feature_headtext,
                'feature_icon' => $originalPath,
            ];
            $productFeature->update($data_product);

        }
        else{
            $data_product=[
                'feature_subtext' => $request->feature_subtext,
                'feature_headtext' => $request->feature_headtext,
                'feature_icon' => $productFeature->feature_icon,
            ];
            $productFeature->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productFeature->product_all_feature->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFeature $productFeature)
    {
        unlink($productFeature->feature_icon);
        $productFeature->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products/'. $productFeature->product_all_feature->product_id);
    }
}

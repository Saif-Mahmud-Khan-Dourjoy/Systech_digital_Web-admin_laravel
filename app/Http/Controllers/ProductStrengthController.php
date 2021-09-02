<?php

namespace App\Http\Controllers;

use App\ProductStrength;
use Illuminate\Http\Request;

class ProductStrengthController extends Controller
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
        return view('admin.product.product_strength.create');
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
            'strength_subtext' => 'required', 
            'strength_headtext' => 'required', 
            'strength_icon' => 'required|mimes:jpeg,bmp,png,jpg', 
        ]);
        
        $image = $request->file('strength_icon');
        $destinationPath = 'img/product/icon/';
        $originalFile = $image->getClientOriginalName();
        $uniqueName = date("Y-m-d").time().$originalFile;
        $image->move($destinationPath, $uniqueName);
        $originalPath = $destinationPath.$uniqueName;
        $data_product=[
            'product_our_strength_id' => $request->product_our_strength_id,
            'strength_subtext' => $request->strength_subtext,
            'strength_headtext' => $request->strength_headtext,
            'strength_icon' => $originalPath,
        ];
        $productStrength = ProductStrength::create($data_product);

        session()->flash('success', 'Successfully Added');
        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductStrength  $productStrength
     * @return \Illuminate\Http\Response
     */
    public function show(ProductStrength $productStrength)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductStrength  $productStrength
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductStrength $productStrength)
    {
        return view('admin.product.product_strength.edit',['productStrength'=> $productStrength]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductStrength  $productStrength
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductStrength $productStrength)
    {
        $this->validate($request, [
            'strength_subtext' => 'required', 
            'strength_headtext' => 'required', 
            'strength_icon' => 'mimes:jpeg,bmp,png,jpg', 
        ]);
        $image=$request->file('strength_icon');
        if(!is_null($image)){
            unlink($productStrength->strength_icon);
            $image = $request->file('strength_icon');
            $destinationPath = 'img/product/icon/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'strength_subtext' => $request->strength_subtext,
                'strength_headtext' => $request->strength_headtext,
                'strength_icon' => $originalPath,
            ];
            $productStrength->update($data_product);

        }
        else{
            $data_product=[
                'strength_subtext' => $request->strength_subtext,
                'strength_headtext' => $request->strength_headtext,
                'strength_icon' => $productStrength->strength_icon,
            ];
            $productStrength->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productStrength->product_our_strength->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductStrength  $productStrength
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductStrength $productStrength)
    {
        unlink($productStrength->strength_icon);
        $productStrength->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products/'. $productStrength->product_our_strength->product_id);
    }
}

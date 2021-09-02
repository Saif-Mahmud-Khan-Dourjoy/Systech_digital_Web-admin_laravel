<?php

namespace App\Http\Controllers;

use App\ProductOurStrength;
use Illuminate\Http\Request;

class ProductOurStrengthController extends Controller
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
     * @param  \App\ProductOurStrength  $productOurStrength
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOurStrength $productOurStrength)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductOurStrength  $productOurStrength
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOurStrength $productOurStrength)
    {
        return view('admin.product.our_strength.edit',['productOurStrength'=>$productOurStrength]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductOurStrength  $productOurStrength
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOurStrength $productOurStrength)
    {
        $this->validate($request, [
            'strength_headline' => 'required',
            'strength_text' => 'required',
        ]);
        
        $data_banner=[
            'strength_headline' =>  $request->strength_headline,
            'strength_text' => $request->strength_text,
        ];
        $productOurStrength->update($data_banner);

        session()->flash('success', 'Successfully Updated');

        return redirect('/products/'. $productOurStrength->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductOurStrength  $productOurStrength
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOurStrength $productOurStrength)
    {
        //
    }
}

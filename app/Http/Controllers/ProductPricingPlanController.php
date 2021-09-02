<?php

namespace App\Http\Controllers;

use App\ProductPricingPlan;
use Illuminate\Http\Request;

class ProductPricingPlanController extends Controller
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
     * @param  \App\ProductPricingPlan  $productPricingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPricingPlan $productPricingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPricingPlan  $productPricingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPricingPlan $productPricingPlan)
    {
        return view('admin.product.pricing_plan.edit',['productPricingPlan'=>$productPricingPlan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPricingPlan  $productPricingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPricingPlan $productPricingPlan)
    {
        $this->validate($request, [
            'contact_for_price_button_link' => 'required',
            'custom_package_button_link' => 'required',
        ]);
        
        $data_banner=[
            'contact_for_price_button_link' =>  $request->contact_for_price_button_link,
            'custom_package_button_link' => $request->custom_package_button_link,
        ];
        $productPricingPlan->update($data_banner);

        session()->flash('success', 'Successfully Updated');

        return redirect('/products/'. $productPricingPlan->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPricingPlan  $productPricingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPricingPlan $productPricingPlan)
    {
        //
    }
}

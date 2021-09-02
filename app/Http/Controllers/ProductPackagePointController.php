<?php

namespace App\Http\Controllers;

use App\ProductPackagePoint;
use Illuminate\Http\Request;

class ProductPackagePointController extends Controller
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
     * @param  \App\ProductPackagePoint  $productPackagePoint
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPackagePoint $productPackagePoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPackagePoint  $productPackagePoint
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPackagePoint $productPackagePoint)
    {
        return view('admin.product.product_package_point.edit',['productPackagePoint' => $productPackagePoint]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPackagePoint  $productPackagePoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPackagePoint $productPackagePoint)
    {
        $this->validate($request, [
            'package_point' => 'required',
        ]);
        
        $data_banner=[
            'package_point' => $request->package_point,
        ];
        $productPackagePoint->update($data_banner);

        session()->flash('success', 'Successfully Updated');

        return redirect('/products/'. $productPackagePoint->product_package->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPackagePoint  $productPackagePoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPackagePoint $productPackagePoint)
    {
        $productPackagePoint->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products/'. $productPackagePoint->product_package->product_id);
    }
}

<?php

namespace App\Http\Controllers;

use App\ProductPackage;
use App\ProductPackagePoint;
use Illuminate\Http\Request;

class ProductPackageController extends Controller
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
        return view('admin.product.product_package.create');
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
            'package_name' => 'required',
            'package_point.*' => 'required',
        ]);
        $data_product_package=[
            'product_id' => $request->product_id,
            'package_name' => $request->package_name,
        ];
        $product_package = ProductPackage::create($data_product_package);

        if(count($request->package_point) > 0) {
            foreach ($request->package_point as $pp_point) {
                $data_product_package_point=[
                    'product_package_id' => $product_package->id,
                    'package_point' => $pp_point, 
                ];
                $product_package_point = ProductPackagePoint::create($data_product_package_point);
            }
        }
        session()->flash('success', 'Successfully Added');

        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductPackage  $productPackage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPackage $productPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPackage  $productPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPackage $productPackage)
    {
        return view('admin.product.product_package.edit',['productPackage'=> $productPackage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPackage  $productPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPackage $productPackage)
    {
        $this->validate($request, [
            'package_name' => 'required',
        ]);
        
        $data_banner=[
            'package_name' =>  $request->package_name,
            'package_status' =>  $request->package_status,

        ];
        $productPackage->update($data_banner);

        session()->flash('success', 'Successfully Updated');

        return redirect('/products/'. $productPackage->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPackage  $productPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPackage $productPackage)
    {
        $productPackage->delete();
        session()->flash('success', 'Point Successfully Deleted');
        return redirect('/products/'. $productPackage->product_id);

    }

    public function add_point($id)
    {
        $productPackage = ProductPackage::find($id);
        return view('admin.product.product_package.add_point',['productPackage'=> $productPackage]);
    }
    public function store_point(Request $request, $id)
    {
        $productPackage = ProductPackage::find($id);

        // print_r($request);
        // exit();
        $this->validate($request, [
            'package_point.*' => 'required',
        ]);
        foreach($request->package_point as $p){
            $data_product=[
                'product_package_id' => $id,
                'package_point' =>  $p,
            ];
            $productPackagePoint = ProductPackagePoint::create($data_product);
        }

        session()->flash('success', 'Point Successfully Added');
        return redirect('/products/'. $productPackage->product_id);

    }

}

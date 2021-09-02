<?php

namespace App\Http\Controllers;

use App\ProductClientImage;
use Illuminate\Http\Request;

class ProductClientImageController extends Controller
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
        return view('admin.product.client_image.create');
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
            'client_link' => 'required', 
            'client_company_logo' => 'required|mimes:jpeg,bmp,png,jpg', 
        ]);
       
        $image = $request->file('client_company_logo');
        $destinationPath = 'img/product/client/';
        $originalFile = $image->getClientOriginalName();
        $uniqueName = date("Y-m-d").time().$originalFile;
        $image->move($destinationPath, $uniqueName);
        $originalPath = $destinationPath.$uniqueName;
        $data_product=[
            'product_id' => $request->product_id,
            'client_link' => $request->client_link,
            'client_company_logo' => $originalPath,
        ];
        $productClientImage = ProductClientImage::create($data_product);

        session()->flash('success', 'Successfully Added');
        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductClientImage  $productClientImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductClientImage $productClientImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductClientImage  $productClientImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductClientImage $productClientImage)
    {
        return view('admin.product.client_image.edit',['productClientImage'=>$productClientImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductClientImage  $productClientImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductClientImage $productClientImage)
    {
        $this->validate($request, [
            'client_link' => 'required', 
            'client_company_logo' => 'mimes:jpeg,bmp,png,jpg', 
        ]);
        $image=$request->file('client_company_logo');
        if(!is_null($image)){
            unlink($productClientImage->client_company_logo);
            $image = $request->file('client_company_logo');
            $destinationPath = 'img/product/photo/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'client_link' => $request->client_link,
                'client_company_logo' => $originalPath,
            ];
            $productClientImage->update($data_product);

        }
        else{
            $data_product=[
                'client_link' => $request->client_link,
                'client_company_logo' => $productClientImage->client_company_logo,
            ];
            $productClientImage->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productClientImage->product_id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductClientImage  $productClientImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductClientImage $productClientImage)
    {
        unlink($productClientImage->client_company_logo);
        $productClientImage->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products/'. $productClientImage->product_id);
    }
}

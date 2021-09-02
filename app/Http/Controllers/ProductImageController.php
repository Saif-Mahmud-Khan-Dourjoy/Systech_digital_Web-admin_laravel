<?php

namespace App\Http\Controllers;

use App\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
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
        return view('admin.product.product_photo.create');
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
            'product_photo' => 'required', 
            'product_photo.*' => 'mimes:jpeg,bmp,png,jpg', 
        ]);

        if(count($request->product_photo) > 0) {
            $i=0;
            foreach ($request->product_photo as $p_photo) {
                $image = $request->file('product_photo')[$i];
                $destinationPath = 'img/product/photo/';
                $originalFile = $image->getClientOriginalName();
                $uniqueName = date("Y-m-d").time().$originalFile;
                $image->move($destinationPath, $uniqueName);
                $product_photo_originalPath = $destinationPath.$uniqueName;

                $data_product_photo=[
                    'product_all_feature_id' => $request->product_all_feature_id,
                    'product_photo' => $product_photo_originalPath,
                ];
                $product_image = ProductImage::create($data_product_photo);
                $i++;
            }
        }

        session()->flash('success', 'Successfully Added');
        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        unlink($productImage->product_photo);
        $productImage->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products/'. $productImage->product_all_feature->product_id);
    }
}

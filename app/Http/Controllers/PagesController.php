<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  redirect('/');
    }
    public function home()
    {
       return view('index');
    }

    public function admin_login()
    {
       return  redirect('/login');
    }

    public function product_list()
    {
        return view('product_list');
    }

    public function product($id)
    {
        $product= Product::find($id);
        $products= Product::all();
        return view('product',['product' => $product, 'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\HomeConcern;
use App\HomeConcernImage;
use Illuminate\Http\Request;

class HomeConcernController extends Controller
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
     * @param  \App\HomeConcern  $homeConcern
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $concern=HomeConcern::with('concern_image')->find($id);
       return view('admin.home.award.view_concern',['concern'=>$concern]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeConcern  $homeConcern
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concern = HomeConcern::find($id); 
       return view('admin.home.award.concern_edit',['concern'=>$concern]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeConcern  $homeConcern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'concern_headline'=>'required',
            'concern_text'=>'required',
       
        ]);

        $concern=HomeConcern::find($id);
        $concern->headline=$request->input('concern_headline');
        $concern->text=$request->input('concern_text');
        $concern->update();
       session()->flash('update', 'Successfully updated');
       return redirect()->route('home_concerns.show',$id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeConcern  $homeConcern
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeConcern $homeConcern)
    {
        //
    }
}

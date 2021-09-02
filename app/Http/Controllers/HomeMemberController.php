<?php

namespace App\Http\Controllers;

use App\HomeMember;
use Illuminate\Http\Request;

class HomeMemberController extends Controller
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
     * @param  \App\HomeMember  $homeMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $member=HomeMember::with('member_image')->find($id);
       return view('admin.home.award.view_member',['member'=>$member]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeMember  $homeMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $member = HomeMember::find($id); 
       return view('admin.home.award.member_edit',['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeMember  $homeMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'member_headline'=>'required',
            'member_text'=>'required',
       
        ]);

        $member=HomeMember::find($id);
        $member->headline=$request->input('member_headline');
        $member->text=$request->input('member_text');
        $member->update();
       session()->flash('update', 'Successfully updated');
       return redirect()->route('home_members.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeMember  $homeMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeMember $homeMember)
    {
        //
    }
}

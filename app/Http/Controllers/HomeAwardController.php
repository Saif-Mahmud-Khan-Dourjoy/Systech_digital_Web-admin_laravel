<?php

namespace App\Http\Controllers;

use App\HomeAward;
use App\HomeRecognition;
use App\HomeConcern;
use App\HomeMember;
use App\HomeConcernImage;
use App\HomeMemberImage;
use Illuminate\Http\Request;

class HomeAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $homeRecognition=HomeRecognition::all();
       $homeAward=HomeAward::first();
       $homeMember=HomeMember::with('member_image')->orderBy('id', 'DESC')->first();
       $homeConcern=HomeConcern::with('concern_image')->orderBy('id', 'DESC')->first();
       
      
        return view('admin.home.award.index',['homeRecognition'=>$homeRecognition,'homeAward'=>$homeAward,'homeMember'=>$homeMember,'homeConcern'=>$homeConcern]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.award.create');
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
            'link.*'=>'required',
        // 'image.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_recognitions',
            'head_text'=>'required',
            'sub_text'=>'required',
            // 'award_image'=>'required|mimes:jpeg,jpg,bmp,png|unique:home_awards',
            'concern_headline'=>'required',
            'concern_text'=>'required',
        // 'concern_image.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_concern_images',
            'member_headline'=>'required',
            'member_text'=>'required',
        // 'member_image.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_member_images',

        ]);
        for($i=0;$i<count($request->input('link'));$i++){
            $recognition= new HomeRecognition;
            $recognition->link=$request->input('link')[$i];
            $image = $request->file('image')[$i];
            $destinationPath = 'img/home/recognition/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $recognition->image=$originalPath;
            $recognition->save();

        }
        $award= new HomeAward;
        $award->head_text=$request->input('head_text');
        $award->sub_text=$request->input('sub_text');
        $award_image = $request->file('award_image');
        $destinationPath = 'img/home/award/';
        $originalFile = $award_image->getClientOriginalName();
        $uniqueName = time().$originalFile;
        $award_image->move($destinationPath, $uniqueName);
        $originalPath = $destinationPath.$uniqueName;
        $award->image=$originalPath;
        $award->save();

        $concern=new HomeConcern;
        $concern->headline=$request->input('concern_headline');
        $concern->text=$request->input('concern_text');
        $concern->save();

        for($i=0;$i<count($request->file('concern_image'));$i++){
            $concern_img=new HomeConcernImage;
            $concern_image = $request->file('concern_image')[$i];
            $destinationPath = 'img/home/concern/';
            $originalFile = $concern_image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $concern_image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $concern_img->image=$originalPath;
            $concern_img->home_concern_id=$concern->id;
            $concern_img->save();

        }

        $member=new HomeMember;
        $member->headline=$request->input('member_headline');
        $member->text=$request->input('member_text');
        $member->save();

        for($i=0;$i<count($request->file('member_image'));$i++){
            $member_img=new HomeMemberImage;
            $member_image = $request->file('member_image')[$i];
            $destinationPath = 'img/home/member/';
            $originalFile = $member_image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $member_image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $member_img->image=$originalPath;
            $member_img->home_member_id=$member->id;
            $member_img->save();

        }

    session()->flash('success', 'Successfully Added');
    return redirect('/home_awards');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeAward  $homeAward
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $award=HomeAward::find($id);
       return view('admin.home.award.view_award',['award'=>$award]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeAward  $homeAward
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $award = HomeAward::find($id); 
       return view('admin.home.award.award_edit',['award'=>$award]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeAward  $homeAward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'head_text'=>'required',
            'sub_text'=>'required',
        // 'image' => 'mimes:jpeg,jpg,bmp,png|unique:home_awards',

        ]);

       $award=HomeAward::find($id);
        $image_prev=$award->image;

        $head_text=$request->input('head_text');
        $sub_text=$request->input('sub_text');
       
        if($request->hasFile('award_image')){
            
            unlink($image_prev);
            $image = $request->file('award_image');
            $destinationPath = 'img/home/award/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text,
             'image'=>$originalPath,
           );
          HomeAward::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_awards');

        }
        else{
          $data=array(
              'head_text'=>$head_text,
             'sub_text'=>$sub_text,
             
           );

          HomeAward::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_awards');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeAward  $homeAward
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeAward $homeAward)
    {
        //
    }
}

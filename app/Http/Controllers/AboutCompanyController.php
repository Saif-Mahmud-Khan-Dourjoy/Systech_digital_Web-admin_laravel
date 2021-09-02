<?php

namespace App\Http\Controllers;

use App\AboutCompany;
use App\CompanySubSection;
use App\CompanyHead;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutCompany=AboutCompany::first();
        $companySubSection=CompanySubSection::all();
        $companyHead=CompanyHead::first();
        return view('admin.home.aboutCompany.index',['aboutCompany'=>$aboutCompany,'companySubSection'=>$companySubSection,'companyHead'=>$companyHead]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.aboutCompany.create');
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
        'headline'=>'required',
        'video'=>'required|mimes:mp4,mov,ogg',
        'description'=>'required',
        'head_text.*'=>'required',
        'sub_text.*' => 'required',
            // 'icon.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:about_companies',
        'name'=>'required',
        'designation'=>'required',
        'signature'=>'required',

    ]);

       $aboutCompany= new AboutCompany;
       $aboutCompany->headline=$request->input('headline');
       $aboutCompany->description=$request->input('description');
       $video = $request->file('video');
       $destinationPath = 'video/home/aboutCompany/';
       $originalFile = $video->getClientOriginalName();
       $uniqueName = time().$originalFile;
       $video->move($destinationPath, $uniqueName);
       $originalPath = $destinationPath.$uniqueName;
       $aboutCompany->video=$originalPath;
       $aboutCompany->save();

       for($i=0;$i<count($request->input('head_text'));$i++){
        $companySubSection= new CompanySubSection;
        $companySubSection->head_text=$request->input('head_text')[$i];
        $companySubSection->sub_text=$request->input('sub_text')[$i];
        $image = $request->file('icon')[$i];
        $destinationPath = 'img/home/companySubSection/';
        $originalFile = $image->getClientOriginalName();
        $uniqueName = time().$originalFile;
        $image->move($destinationPath, $uniqueName);
        $originalPath = $destinationPath.$uniqueName;
        $companySubSection->icon=$originalPath;
        $companySubSection->about_company_id=$aboutCompany->id;
        $companySubSection->save();

    }

    $companyHead=New CompanyHead;
    $companyHead->name=$request->input('name');
    $companyHead->designation=$request->input('designation');

    $signature = $request->file('signature');
    $destinationPath = 'img/home/companyhead/';
    $originalFile = $signature->getClientOriginalName();
    $uniqueName = time().$originalFile;
    $signature->move($destinationPath, $uniqueName);
    $originalPath = $destinationPath.$uniqueName;
    $companyHead->signature=$originalPath;
    $companyHead->about_company_id=$aboutCompany->id;
    $companyHead->save();
       session()->flash('success', 'Successfully Added');
    return redirect('/about_company');



}

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $com_info=AboutCompany::find($id);
        return view('admin.home.aboutCompany.view_company_info',['com_info'=>$com_info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $com_info = AboutCompany::find($id); 
       return view('admin.home.aboutCompany.company_info_edit',['com_info'=>$com_info]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'headline'=>'required',
            'video'=>'mimes:mp4,mov,ogg',
            'description'=>'required',
        ]);

        $abt_com=AboutCompany::find($id);
        $video_prev=$abt_com->video;

        $headline=$request->input('headline');
        $description=$request->input('description');

        if($request->hasFile('video')){

            unlink($video_prev);
            $video = $request->file('video');
            $destinationPath = 'video/home/aboutCompany/';
            $originalFile = $video->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $video->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;

            $data=array(
               'headline'=>$headline,
               'description'=>$description,
               'video'=>$originalPath,
           );
            AboutCompany::where('id',$id)->update($data);
            session()->flash('update', 'Successfully updated');
            return redirect('/about_company');
        }

          else{
          $data=array(
             'headline'=>$headline,
             'description'=>$description
             
           );

          AboutCompany::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/about_company');
            
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutCompany  $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutCompany $aboutCompany)
    {
        //
    }
}

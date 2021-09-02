<?php

namespace App\Http\Controllers;

use App\CompanySubSection;
use Illuminate\Http\Request;

class CompanySubSectionController extends Controller
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
     * @param  \App\CompanySubSection  $companySubSection
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $com_sub_section=CompanySubSection::find($id);
       return view('admin.home.aboutCompany.view_company_sub_section',['com_sub_section'=>$com_sub_section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanySubSection  $companySubSection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $com_sub_section=CompanySubSection::find($id);
        return view('admin.home.aboutCompany.company_sub_section_edit',['com_sub_section'=>$com_sub_section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanySubSection  $companySubSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'head_text'=>'required',
            'sub_text' => 'required',
            'icon' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $com_sub_section=CompanySubSection::find($id);
        $icon_image=$com_sub_section->icon;

        $head_text=$request->input('head_text');
        $sub_text=$request->input('sub_text');
       
        if($request->hasFile('icon')){
            
            unlink($icon_image);
            $image = $request->file('icon');
            $destinationPath = 'img/home/companySubSection/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text,
             'icon'=>$originalPath,
           );
          CompanySubSection::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/about_company');

        }
        else{
          $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text
             
           );

          CompanySubSection::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/about_company');
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanySubSection  $companySubSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanySubSection $companySubSection)
    {
        //
    }
}

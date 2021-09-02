<?php

namespace App\Http\Controllers;

use App\CompanyHead;
use Illuminate\Http\Request;

class CompanyHeadController extends Controller
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
     * @param  \App\CompanyHead  $companyHead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $com_head=CompanyHead::find($id);
       return view('admin.home.aboutCompany.view_company_head',['com_head'=>$com_head]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyHead  $companyHead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $com_head=CompanyHead::find($id);
       return view('admin.home.aboutCompany.company_head_edit',['com_head'=>$com_head]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyHead  $companyHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $this->validate($request, [
            'name'=>'required',
            'designation' => 'required',
            'signature' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $companyHead=CompanyHead::find($id);
        $signature_image=$companyHead->signature;

        $name=$request->input('name');
        $designation=$request->input('designation');
       
        if($request->hasFile('signature')){
            
            unlink($signature_image);
            $image = $request->file('signature');
            $destinationPath = 'img/home/companyhead/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'name'=>$name,
             'designation'=>$designation,
             'signature'=>$originalPath,
           );
          CompanyHead::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/about_company');

        }
        else{
          $data=array(
              'name'=>$name,
             'designation'=>$designation,
             
           );

          CompanyHead::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/about_company');
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyHead  $companyHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyHead $companyHead)
    {
        //
    }
}

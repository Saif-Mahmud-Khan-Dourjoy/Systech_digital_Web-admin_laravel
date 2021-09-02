<?php

namespace App\Http\Controllers;

use App\HomeTestimonial;
use Illuminate\Http\Request;

class HomeTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $testimonials=HomeTestimonial::all();
       return view('admin.home.testimonial.index',['testimonials'=>$testimonials]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.home.testimonial.create');
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
            'name.*'=>'required',
            'designation.*' => 'required',
            'text.*' => 'required',
            // 'image.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_testimonials',
        ]);
        for($i=0;$i<count($request->input('name'));$i++){
            $testimonial= new HomeTestimonial;
            $testimonial->name=$request->input('name')[$i];
            $testimonial->designation=$request->input('designation')[$i];
            $testimonial->text=$request->input('text')[$i];
            $image = $request->file('image')[$i];
            $destinationPath = 'img/home/testimonial/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $testimonial->image=$originalPath;
            
            $testimonial->save();

        }


        session()->flash('success', 'Successfully Added');
        return redirect('/home_testimonials');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeTestimonial  $homeTestimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial=HomeTestimonial::find($id);
       return view('admin.home.testimonial.view',['testimonial'=>$testimonial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeTestimonial  $homeTestimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = HomeTestimonial::find($id); 
       return view('admin.home.testimonial.edit',['testimonial'=>$testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeTestimonial  $homeTestimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name'=>'required',
            'designation' => 'required',
            'text' => 'required',
            // 'image.*' => 'mimes:jpeg,jpg,bmp,png|unique:home_testimonials',
        ]);
        $testimonial=HomeTestimonial::find($id);
        $image_prev=$testimonial->image;

        $name=$request->input('name');
        $designation=$request->input('designation');
        $text=$request->input('text');
       
        if($request->hasFile('image')){
            
            unlink($image_prev);
            $image = $request->file('image');
            $destinationPath = 'img/home/testimonial/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'name'=>$name,
             'designation'=>$designation,
             'text'=>$text,
             'image'=>$originalPath,
           );
          HomeTestimonial::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_testimonials');

        }
        else{
          $data=array(
             'name'=>$name,
             'designation'=>$designation,
             'text'=>$text,
             
           );

          HomeTestimonial::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_testimonials');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeTestimonial  $homeTestimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=HomeTestimonial::find($id);
        unlink($testimonial->image);
        $testimonial->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/home_testimonials');
    }
}

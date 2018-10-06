<?php

namespace App\Http\Controllers;

use App\employer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.index');
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
             $this->validate($request, [
                  'first_name' => 'required',
                  'last_name' => 'required',
                  'keywords' => 'required',
                  'resume'    =>  'mimes:doc,pdf,docx'
              ]);
        

            $cover = $request->file('resume');
            $extension = $cover->getClientOriginalExtension();

            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

            $employer = new employer();

            $employer->first_name  = $request->first_name;
            $employer->last_name = $request->last_name;
            $employer->keywords= $request->keywords;

           

            
            
              


            $employer->filename = $cover->getFilename().'.'.$extension;
            $employer->mime = $cover->getClientMimeType();
            $employer->original_filename = $cover->getClientOriginalName();
            
            $employer->save();

       
           return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $employers = employer::all();
        return view('layouts.index',compact('employers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(employer $employer)
    {
        //
    }

    public function search()
    {
              

              $keywords = $_GET['search'];

              $employers = employer::where([ 
                    ['keywords', 'LIKE', '%' . $keywords . '%'],
                ])->get();

                    return view('layouts.index', compact('employers'));
                
    }
}

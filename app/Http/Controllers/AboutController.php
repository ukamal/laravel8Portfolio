<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAbout()
    {
        return view('admin.about.add_about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
        ]);

        About::insert([
            'title'    => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('all-about')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::find($id);
        return view('admin.about.edit_about',compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function updateAbout(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
        ]);

        $update = About::find($id)->update([
            'title'    => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);

        return redirect()->route('all-about')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully');
    }

    //About home page
    public function aboutHomePage(){
        return view('layouts.frontend.pages.about');
    }

}

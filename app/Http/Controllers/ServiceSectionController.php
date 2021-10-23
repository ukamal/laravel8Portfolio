<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class ServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceSection::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add_service');
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
            'icon' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
        ]);

        $icons = $request->file('icon');
        $name_gen = hexdec(uniqid()).'.'.$icons->getClientOriginalExtension();
        Image::make($icons)->resize(50,50)->save('image/icon/'.$name_gen);
        $last_icon = 'image/icon/'.$name_gen;

        ServiceSection::insert([
            'page_sub_title' => $request->page_sub_title,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'icon' => $last_icon,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('all-service')->with('success','Services add successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceSection  $serviceSection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = ServiceSection::find($id);
        return view('admin.service.edit_service',compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceSection  $serviceSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $old_image = $request->old_image;

        $image = $request->file('icon');

        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/icon/';
            $last_image = $up_location.$img_name;
            $image->move($up_location,$img_name);
    
            unlink($old_image);
    
            ServiceSection::find($id)->update([
                'page_sub_title' => $request->page_sub_title,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'icon' => $last_image,
                'created_at' => Carbon::now()
            ]);
    
            return redirect()->route('all-service')->with('success','Service update successfully!');
        }else{
            ServiceSection::find($id)->update([
                'page_sub_title' => $request->page_sub_title,
                'title'         => $request->title,
                'sub_title'     => $request->sub_title,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('all-service')->with('success','Service update successfully!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceSection  $serviceSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ServiceSection::find($id);
        $old_image = $image->icon;
        unlink($old_image);
        
        ServiceSection::find($id)->delete();
        return redirect()->back()->with('success','Service Deleted successfully!');
    }

    //Service Home Page
    public function seriveHomePage(){
        return view('layouts.frontend.pages.service');
    }

}

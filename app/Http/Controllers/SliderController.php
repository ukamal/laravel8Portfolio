<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Slider;
use Image;
use Auth;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function addSlider(){
        return view('admin.slider.add_slider');
    }

    public function storeSlider(Request $request){
        $validated = $request->validate([
            'title'     => 'required',
            'description' => 'required',
            'image'     => 'required',
        ]);

        $sliderimg = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$sliderimg->getClientOriginalExtension();
        Image::make($sliderimg)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_image = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_image,
            'created_at' => Carbon::now()
        ]);

    return redirect()->route('all-slider')->with('success','Slider added successfully!');
    }

    public function editSlider($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit_slider',compact('sliders'));
    }

    public function updateSlider(Request $request, $id){

        $old_image = $request->old_image;

        $image = $request->file('image');

        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_image = $up_location.$img_name;
            $image->move($up_location,$img_name);
    
            unlink($old_image);
    
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_image,
                'created_at' => Carbon::now()
            ]);
    
            return redirect()->route('all-slider')->with('success','Slider update successfully!');
        }else{
            Slider::find($id)->update([
                'title'     => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('all-slider')->with('success','Slider update successfully!');
        }
    }

    public function deleteSlider($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        
        Slider::find($id)->delete();
        return redirect()->back()->with('success','Brand Deleted successfully!');
    }

}

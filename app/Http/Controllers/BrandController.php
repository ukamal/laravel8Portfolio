<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Multiple;
use Auth;
use Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
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
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required',
        ],
        [
            'brand_name.required' => 'Please select the brand name',
            'brand_image.min' => 'Brand Less then 4 checter',
        ]);

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'image/brand/';
        // $last_image = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        //use intervention image
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,300)->save('image/brand/'.$name_gen);
        $last_image = 'image/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'created_at' => Carbon::now()
        ]);

        //tostr alert
        $notification = array(
            'message' => 'Brand added successfull!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function brandEdit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    public function brandUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please select the update brand name',
            'brand_image.min' => 'Brand Less then 4 checter',
        ]);

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if($brand_image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_image = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
    
            unlink($old_image);
    
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_image,
                'created_at' => Carbon::now()
            ]);

             //tostr alert
            $notification = array(
                'message' => 'Brand update successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.brand')->with($notification);
        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            return redirect()->back()->with('success','Brand update successfully!');
        }
   
        
    }

   
    public function brandDelete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        
        Brand::find($id)->delete();

        $notify = array(
            'message' => 'Brand Deleted successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notify);
    }

    //Multiple Image
    public function allMultipleImg()
    {
        $images = Multiple::all();
        return view('admin.multi_img.index',compact('images'));
    }
 
    public function multiImgStore(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
        ],
        [
            'image.min' => 'Image Less then 4 checter',
        ]);

        $image = $request->file('image');

        foreach($image as $multi_img){
            //use intervention image
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,300)->save('image/multipleimg/'.$name_gen);
            $last_image = 'image/multipleimg/'.$name_gen;

            Multiple::insert([
                'image' => $last_image,
                'created_at' => Carbon::now()
            ]);
        }
     

        return redirect()->back()->with('success','Brand added successfull!');
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout successfully!');
    }

}

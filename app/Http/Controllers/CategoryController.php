<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $showCat = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        //$showCat = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index',compact('showCat','trashCat'));
    }

    public function addCat(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please select the category item',
            'category_name.max' => 'Less then 255Chars',
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->back()->with('success','Category inserted successfully!');
    }

    public function editCat($id){
        $showCat = Category::find($id);
        return view('admin.category.editcat',compact('showCat'));
    }

    public function update(Request $request, $id){
        // $update = Category::find($id);
        // $update->category_name = $request->category_name;
        // $update->user_id = Auth::user()->id;
        // $update->update();

        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('all.category')->with('success','Category updated successfully!');
    }

    public function softDelete($id){
        $softDelete = Category::find($id)->delete();

        return redirect()->back()->with('success','Category soft delete successfully');
    }

    public function restoreCat($id){
        $delete = Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success','Category restore successfully');
    }

    public function pDelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
         return redirect()->back()->with('success','Category Permanently delete');
    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }
    
    public function AddCategory(){
        return view('backend.category.add_category');
    }

    public function StoreCategory(Request $request){
            Category::insert([
                'category_name'=> $request->category_name,
                'category_slug'=> strtolower(str_replace(' ','-',$request->category_name))
            ]);
            $notification = array(
                'message' =>'Category Added Successfull',
                'alert-type' => 'success'
               );
 
               return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);

        return view('backend.category.edit_category',compact('category'));
    }
    public function UpdateCategory(Request $request){
        $id = $request->id;
       Category::findOrFail($id)->update([
        'category_name'=> $request->category_name,
        'category_slug'=> strtolower(str_replace(' ','-',$request->category_name))
       ]);
       $notification = array(
        'message' =>'Updated Successfull',
        'alert-type' => 'success'
       );
       return redirect()->route('all.category')->with($notification);



    }
    public function DeleteCategory($id){
        $category = Category::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Deleted Successfully',
            'alert-type' => 'success'
           );
           return redirect()->back()->with($notification);


    }
}

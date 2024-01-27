<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function AllTesti(){
        $allTesti = Testimonial::latest()->get();
        return view('backend.testimonial.all_testi', compact('allTesti'));
    }

    public function AddTesti(){
        return view('backend.testimonial.add_testi');
    }

    public function StoreTesti(Request $request){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/testimonial/' . $name_gen);
        $save_url = 'upload/testimonial/' . $name_gen;
        Testimonial::insert([

            'name' => $request->name,
           
            
            'details' => $request->details,
            'designation' => $request->designation,
            
            
            'image' => $save_url,
        
            
           
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Testimonial Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testi.post')->with($notification);
    }

    public function EditTesti($id){
        $testi = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit_testi', compact('testi'));
    }

    public function UpdateTesti(Request $request){
        $id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/testimonial/' . $name_gen);
            $save_url = 'upload/testimonial/' . $name_gen;

            Testimonial::findOrFail($id)->update([

                'name' => $request->name,
           
            
                'details' => $request->details,
                'designation' => $request->designation,
                
                
                'image' => $save_url,
            
                
               
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.testi.post')->with($notification);
        } else {
            Testimonial::findOrFail($id)->update([

                'name' => $request->name,
           
            
                'details' => $request->details,
                'designation' => $request->designation,
                
                
           
            
                
               
                'created_at' => Carbon::now(),

            ]);

         

            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.testi.post')->with($notification);
        }

    }

    public function DeleteTesti($id){
        $post_image = Testimonial::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        Testimonial::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Testimonial Deleted Successfull',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}

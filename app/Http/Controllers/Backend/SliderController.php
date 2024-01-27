<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SliderGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    public function AllSlider(){
        $sliders = SliderGallery::latest()->get();
        return view('backend.slider.all_slider',compact('sliders'));
    }
    public function AddSliderGallery(){
        return view('backend.slider.add_slider');
    }
    public function StoreSlider(Request $request){
        $images = $request->file('multi_image');

        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1280, 690)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            SliderGallery::insert([
                'slider_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y')
            ]);
            
        }
        $notification = array(
            'message' => 'Slider Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    public function EditSlider($id)
    {
        $slider = SliderGallery::findOrFail($id);
        return view('backend.slider.edit_slider', compact('slider'));
    }

    public function UpdateSlider(Request $request)
    {
        $photo_id = $request->id;

        if ($request->file('multi_image')) {

            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1280, 690)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            SliderGallery::findOrFail($photo_id)->update([
                'slider_gallery' => $save_url,
                

            ]);

            $notification = array(
                'message' => 'Slider Gallery Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('all.slider')->with($notification);

        } // End If 
    }

    public function DeleteSlider($id){
        $photo = SliderGallery::findOrFail($id);
        $img = $photo->slider_gallery;
        unlink($img);

        SliderGallery::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'danger'

        );
        return redirect()->route('all.slider')->with($notification);

    }
}

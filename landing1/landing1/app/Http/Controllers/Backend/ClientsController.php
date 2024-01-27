<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    public function AllClients(){
        $clients = client::latest()->get();
        return view('backend.clients.all_clients',compact('clients'));
    }
    public function AddClients(){
        return view('backend.clients.add_clients');
    }

    public function StoreClients(Request $request){
        $images = $request->file('multi_image');

        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1280, 690)->save('upload/clients/' . $name_gen);
            $save_url = 'upload/clients/' . $name_gen;

            client::insert([
                'image' => $save_url,

            ]);

        }
        $notification = array(
            'message' => 'Clients Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditClients($id){
        $clients = client::findOrFail($id);
        return view('backend.clients.edit_clients',compact('clients'));
    }

    public function UpdateClients(Request $request)
    {
        $photo_id = $request->id;

        if ($request->file('multi_image')) {

            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1280, 690)->save('upload/clients/' . $name_gen);
            $save_url = 'upload/clients/' . $name_gen;

            client::findOrFail($photo_id)->update([
                'image' => $save_url,


            ]);

            $notification = array(
                'message' => 'Slider Gallery Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('all.clients')->with($notification);

        } // End If
    }
    public function DeleteClients($id){
        $photo = client::findOrFail($id);
        $img = $photo->image;
        unlink($img);

        client::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'danger'

        );
        return redirect()->route('all.clients')->with($notification);

    }
}

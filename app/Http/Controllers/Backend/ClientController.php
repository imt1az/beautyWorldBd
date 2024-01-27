<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
  public function AllClient(){
    $clients = Client::latest()->get();
    return view('backend.client.all_client',compact('clients'));
  }

  public function AddClient(){
    return view('backend.client.add_client');
  }
  public function StoreClient(Request $request){
    $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/client/' . $name_gen);
        $save_url = 'upload/client/' . $name_gen;

        Client::insert([

         
           
            
            'name' => $request->name,
            

            'details' => $request->details,
          
          

            
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

       

        ////////// End Multiple Image Upload Start ///////////
        $notification = array(
            'message' => 'Client Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
  }

  public function EditClient($id){
       $client = Client::findOrFail($id);
       return view('backend.client.edit_client',compact('client'));
  }

  public function UpdateClient(Request $request){
    $id = $request->id;

    if ($request->file('image')) {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/client/' . $name_gen);
        $save_url = 'upload/client/' . $name_gen;

        Client::findOrFail($id)->update([

            
       
        
            'name' => $request->name,
            
            'details' => $request->details,
          
         

            
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Client Updated with image Successfull',
            'alert-type' => 'success'
        );

        return redirect()->route('all.client')->with($notification);
    } else {
        Client::findOrFail($id)->update([

            'name' => $request->name,
            
            'details' => $request->details,

            
      
          

            'updated_at' => Carbon::now(),

        ]);

     

        $notification = array(
            'message' => 'Client Updated without image Successfull',
            'alert-type' => 'success'
        );

        return redirect()->route('all.client')->with($notification);
    }
  }

  public function DeleteClient($id)
    {
        $post_image = Client::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        Client::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Client Deleted Successfull',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
    }
}

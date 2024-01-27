<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function AllService(){
        $allService = Service::latest()->get();
        return view('backend.service.all_service_post', compact('allService'));
    }

    public function AddService(){
        return view('backend.service.add_service_post');
    }
    public function StoreService(Request $request){
        Service::insert([

            'title' => $request->title,
           
            
            'description' => $request->description,
            

        
            
           
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Service Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->route('all.service.post')->with($notification);
    }

    public function EditService($id){
        
        
       
        $service = Service::findOrFail($id);
        return view('backend.service.edit_service', compact('service'));
    }

    public function UpdateService(Request $request){
        $id = $request->id;

        Service::findOrFail($id)->update([
          'title' => $request->title,
          'description'=> $request->description
        ]);
        $notification = array(
            'message' => 'Service Updated Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteService($id){
        Service::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
    }


}

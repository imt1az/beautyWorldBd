<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class CompanyController extends Controller
{
    public function AllCompany(){
        $company = Company::latest()->get();
        return view('backend.company.allcompany',compact('company'));
    }

    public function AddCompany(){
        return view('backend.company.addCompany');
    }

    public function StoreCompany(Request $request){
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/company/' . $name_gen);
        $save_url = 'upload/company/' . $name_gen;

        Company::insert([

            'details' => $request->details,
            'link' => $request->link,
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

       

        ////////// End Multiple Image Upload Start ///////////
        $notification = array(
            'message' => 'Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

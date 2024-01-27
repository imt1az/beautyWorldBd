<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\NewsPost;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){
      
        $services = Service::latest()->get();
        $products = NewsPost::orderBy('id','DESC')->limit(10)->get();
        $categories = Category::latest()->get();
        $testimonials = Testimonial::orderBy('id','DESC')->limit(5)->get();
        $clients = Client::orderBy('id','DESC')->limit(10)->get();
        $teams = Team::orderBy('id','DESC')->limit(5)->get();
        

        return view('frontend.index',compact('products','categories','clients','teams'));
    }

    public function ServiceDetails($id){
        $service = Service::findOrFail($id);

        return view('frontend.service.service_details',compact('service'));
    }
    public function ProductDetails($id){
        $product = NewsPost::findOrFail($id);
        $products = NewsPost::latest()->get();
        return view('frontend.product.product_details',compact('product','products'));
    }

    public function ClientDetails($id){
        $client = Client::findOrFail($id);
        return view('frontend.client.client_details',compact('client'));
    }
}

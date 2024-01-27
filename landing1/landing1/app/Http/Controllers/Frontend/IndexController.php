<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\client;
use App\Models\NewsPost;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){

        $services = Service::latest()->get();
        $products = NewsPost::orderBy('id','DESC')->limit(10)->get();
        $categories = Category::latest()->get();
        $testimonials = Testimonial::orderBy('id','DESC')->limit(10)->get();
        $clients = client::orderBy('id','DESC')->limit(10)->get();


        return view('frontend.index',compact('products','categories','testimonials','clients'));
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
}

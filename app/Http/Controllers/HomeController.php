<?php

namespace App\Http\Controllers;
use App\Models\Services;
use App\Models\Industry;
use App\Models\Blog;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $services = Services::all();

        $servicesArray = [];
        foreach ($services as $service) {
            $servicesArray[$service->service_name] = explode(',', $service->keys);
        }
        $industries = Industry::all();
        $industriesArray = [];
        foreach ($industries as $industry) {
            $industriesArray[$industry->name] = explode(',', $industry->keys);
        }

        $blogs = Blog::with(['industry', 'service'])->get();
        $blogs_pagination = Blog::with(['industry', 'service'])->paginate(3);
    // print_r($destination_master);exit;
    return view('welcome',compact('servicesArray','industriesArray','blogs','services','industries','blogs_pagination'));
    }

    
}

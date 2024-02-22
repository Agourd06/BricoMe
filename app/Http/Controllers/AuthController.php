<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(request $request){
        $userData = $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
            'telephone' => 'required',
            'city' => 'required',
            'description' => 'required',
            'profile-image' => 'required',
            'job' => 'required',
            'skills[]' => 'required',
            'photoTabs' => 'required',
            'singlePhoto' => 'required',
            'multiplePhotos[]' => 'required',
            'service1' => 'required',
            'tarif1' => 'required',
            'service2' => 'required',
            'tarif2' => 'required'
        ]);
        return view('artisan.artisan');
    }
}

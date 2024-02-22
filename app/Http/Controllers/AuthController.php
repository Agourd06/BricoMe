<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class AuthController extends Controller
{
    public function register(request $request){

        
        $userData = $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'unique:users,email',
            'password' => ['required', 'min:6', 'max:16', 'same:Cpassword'],
            'cpassword' => ['required', 'min:6', 'max:16'],
            'telephone' => 'required',
            'city' => 'required',
            'profile-image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'role'=> '[]',
        ],


            [
                'lname.required' => 'The last name field is required.',
                'fname.required' => 'The first name field is required.',
                'email.required' => 'The email field is required.',
                'city.required' => 'The city field is required.',
                'telephone.required' => 'The telephone field is required.',
                'password.min' => 'The password must have more than 3 characters.',
                'password.max' => 'The password must have less than 16 characters.',
                'password.required' => 'The password is required.',
                'cpassword.min' => 'The password must have more than 3 characters.',
                'cpassword.max' => 'The password must have less than 16 characters.',
                'cpassword.required' => 'The password is required.',
                'profile_image.required' => 'The image is required.',
                'profile_image.image' => 'The file must be an image.',
                'profile_image.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                'profile_image.max' => 'The image must not be larger than 2048 kilobytes.',
            ]
        );

        if($userData['role'=== 'artisan']){
            $artisanData = $request->validate([
                'description' => 'required',
                'job' => 'required',
                'skills[]' => 'required',
                'photoTabs' => 'required',
                'multiplePhotos[]' => 'required',
                'service1' => 'required',
                'tarif1' => 'required',
                'service2' => 'required',
                'tarif2' => 'required'

            ],
            [
                'description.required' => 'Description is empty! Please fill it out.',
                'job.required' => 'Job is empty! Please fill it out.',
              'skills[].required' => 'Skills is empty! Please fill it out.',
               'photoTabs.required' => 'Photo tabs is empty! Please fill it out.',
             'multiplePhotos[].required' => 'Multiple photos is empty! Please fill it out.',
             'service1.required' => 'Service 1 is empty! Please fill it out.',
               'tarif1.required' => 'Tarif 1 is empty! Please fill it out.',
              'service2.required' => 'Service 2 is empty! Please fill it out.',
               'tarif2.required' => 'Tarif 2 is empty! Please fill it out.',
            ]
        
        );

        }elseif ($userData['role'=== 'client']){
            $clientData = $request->validate([
                'description' => 'required',
           

            ],
            [
                'description.required' => 'Description is empty! Please fill it out.',
            ]
        
        );

        }
     
           
        if($userData['password'] !== $userData['cpassword']){
            return back()->with('error','Passwords do not match');
        }
        $userData['password'] = bcrypt($userData['password']);
        if($request->hasFile('multiplePhotos[]')){
            $file = $request->File('multiplePhotos');	
            $pictureName = time() . '.';

        }
        
   
        return view('artisan.artisan');
    }
}

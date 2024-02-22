<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request){

        try {
        $userData = $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'unique:users,email',
            'password' => ['required', 'min:6', 'max:16', 'same:cpassword'],
            'cpassword' => ['required', 'min:6', 'max:16'],
            'phone' => 'required',
            'city' => 'required',
            'profil' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'role' => '',
        ] ,
        


            [
                'lname.required' => 'The last name field is required.',
                'fname.required' => 'The first name field is required.',
                'email.required' => 'The email field is required.',
                'city.required' => 'The city field is required.',
                'phone.required' => 'The telephone field is required.',
                'password.min' => 'The password must have more than 3 characters.',
                'password.max' => 'The password must have less than 16 characters.',
                'password.required' => 'The password is required.',
                'cpassword.min' => 'The password must have more than 3 characters.',
                'cpassword.max' => 'The password must have less than 16 characters.',
                'cpassword.required' => 'The password is required.',
                'profil.required' => 'The image is required.',
                'profil.image' => 'The file must be an image.',
                'profil.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                'profil.max' => 'The image must not be larger than 2048 kilobytes.',
            ]
        );

        if($userData['role' == 'artisan']){
            $artisanData = $request->validate([
                'description' => 'required',
                'job' => 'required',
                'skills' => 'required|array',
                'multiplePhotos' => 'required|array',
                
                

            ],
            [
                'description.required' => 'Description is empty! Please fill it out.',
                'job.required' => 'Job is empty! Please fill it out.',
              'skills[].required' => 'Skills is empty! Please fill it out.',
             'multiplePhotos[].required' => 'Multiple photos is empty! Please fill it out.',
            
            ]
        
        );

        }
        // else if(){

        // }
           
        if($userData['password'] !== $userData['cpassword']){
            return back()->with('error','Passwords do not match');
        }
        $userData['password'] = bcrypt($userData['password']);
        if ($request->hasFile('multiplePhotos')) {
            $files = $request->file('multiplePhotos');
            $filePaths = [];
        
            foreach ($files as $file) {
                $pictureName = time() . '.' . $file->extension();
                $file->storeAs('public/image', $pictureName);
                $filePaths[] = $pictureName;
            }
        
            $userData['multiplePhotos'] = $filePaths;
        }
        

    $user = User::create($userData);

    if($userData['role'] == "artisan") {

        $userData['user_id']= $user->id;
        artisan::create($artisanData);
        auth()->login($user);
        return redirect('/registreArtisan');

}
return view('artisan.artisan');}
catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    return response()->view('errors.404', [], 404);
}
       
    }
}

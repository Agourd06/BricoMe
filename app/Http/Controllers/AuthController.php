<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\job;
use App\Models\User;
use App\Models\Admin;
use App\Models\image;
use App\Models\Client;
use App\Models\Artisan;
use Illuminate\Http\Request;
use App\Models\artisanCompetence;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        try {
            $userData = $request->validate(
                [
                    'lname' => 'required',
                    'fname' => 'required',
                    'email' => 'unique:users,email',
                    'birthDay' => 'unique:users,email',
                    'password' => ['required', 'min:6', 'max:16', 'same:cpassword'],
                    'cpassword' => ['required', 'min:6', 'max:16'],
                    'Phone' => 'required',
                    'city' => 'required',
                    'Profil' => ['required', 'image'],
                    'role' => '',
                ],



                [
                    'lname.required' => 'The last name field is required.',
                    'fname.required' => 'The first name field is required.',
                    'email.required' => 'The email field is required.',
                    'city.required' => 'The city field is required.',
                    'Phone.required' => 'The Phone field is required.',
                    'password.min' => 'The password must have more than 3 characters.',
                    'password.max' => 'The password must have less than 16 characters.',
                    'password.required' => 'The password is required.',
                    'cpassword.min' => 'The password must have more than 3 characters.',
                    'cpassword.max' => 'The password must have less than 16 characters.',
                    'cpassword.required' => 'The password is required.',
                    'Profil.required' => 'The image is required.',
                    'Profil.image' => 'The file must be an image.',
                    'Profil.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                    'Profil.max' => 'The image must not be larger than 2048 kilobytes.',
                ]
            );

            if ($userData['role'] == 'artisan') {
                $artisanData = $request->validate([
                    'description' => 'required',
                    'job' => 'required',
                    'skills' => 'required|array',
                    'multiplePhotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ], [
                    'description.required' => 'Description is empty! Please fill it out.',
                    'job.required' => 'Job is empty! Please fill it out.',
                    'skills.required' => 'Skills is empty! Please fill it out.',
                    'multiplePhotos.*' => 'Incorrect Data. Please try again.',
                ]);
            } elseif ($userData['role'] === 'client') {
                $clientData = $request->validate(
                    [
                        'description' => 'required',


                    ],
                    [
                        'description.required' => 'Description is empty! Please fill it out.',
                    ]
                );
            }




            $userData['password'] = Hash::make($userData['password']);
            $user = User::create($userData);

            if ($userData['role'] == 'artisan') {

                $artisan = Artisan::create([
                    'user_id' => $user->id,
                    'description' => $artisanData['description'],
                    'job' => $artisanData['job'],
                ]);
                $artisanId =  $artisan->id;
                if ($request->hasFile('multiplePhotos')) {
                    $files = $request->file('multiplePhotos');
                    foreach ($files as $file) {
                        $pictureName = time() . '.' . $file->extension();
                        $file->storeAs('public/image', $pictureName);
                        $images = image::create([
                            'image' => $pictureName,
                            'artisan_id' => $artisanId,

                        ]);
                    }
                }

                foreach ($artisanData['skills'] as $skill) {
                    artisanCompetence::create([
                        'artisan_id' => $artisanId,
                        'competence' => $skill,
                    ]);
                }
                auth()->login($user);

                return redirect('/Artisan');
            } elseif ($userData['role'] == 'client') {

                Admin::create([
                    'user_id' => $user->id,

                ]);
                auth()->login($user);

                return redirect('/admin');
            }

            // return view('artisan.artisan');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function ArtisanRegisterData()
    {

        $jobs = job::all();
        $competences = Competence::with('job')->get();
        return view('artisan.registreArtisan', [
            'jobs' => $jobs,
            'competences' => $competences,
        ]);
    }
}

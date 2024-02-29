<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\job;
use App\Models\User;
use App\Models\image;
use App\Models\Client;
use App\Models\Artisan;
use App\Models\Competence;
use App\Models\artisanJobs;
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

            //--------------------- User Validation----------------------

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
                    'Profil' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                    'role' => '',
                ],



                [
                    'lname.required' => 'The last name field is required.',
                    'fname.required' => 'The first name field is required.',
                    'email.required' => 'The email field is required.',
                    'city.required' => 'The city field is required.',
                    'Phone.required' => 'The Phone field is required.',
                    'password.min' => 'The password must have more than 6 characters.',
                    'password.max' => 'The password must have less than 16 characters.',
                    'password.required' => 'The password is required.',
                    'cpassword.min' => 'The password must have more than 6 characters.',
                    'cpassword.max' => 'The password must have less than 16 characters.',
                    'cpassword.required' => 'The password is required.',
                    'Profil.required' => 'The image is required.',
                    'Profil.image' => 'The file must be an image.',
                    'Profil.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                    'Profil.max' => 'The image must not be larger than 2048 kilobytes.',
                ]
            );

            if ($userData['role'] == 'artisan') {

                //--------------------- Artisan Validation----------------------


                $artisanData = $request->validate([
                    'description' => 'required',
                    'job_id' => 'required',
                    'skills' => 'required|array',
                    'type' => 'artisan',
                    'multiplePhotos.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:3060'],
                ], [
                    'description.required' => 'Description is empty! Please fill it out.',
                    'job_id.required' => 'Job is empty! Please fill it out.',
                    'skills.required' => 'Skills is empty! Please fill it out.',
                    'multiplePhotos.*' => 'Incorrect Data. Please try again.',
                ]);
            } elseif ($userData['role'] === 'client') {

                //--------------------- Cliens Validation----------------------


                $clientData = $request->validate(
                    [
                        'description' => 'required',


                    ],
                    [
                        'description.required' => 'Description is empty! Please fill it out.',
                    ]
                );
            }

            //--------------------- User Profil Data Validation----------------------

            if ($request->hasFile('Profil')) {
                $file = $request->file('Profil');
                $pictureName = time() . '1.' . $file->extension();
                $file->storeAs('public/image', $pictureName);
                $userData['Profil'] = $pictureName;
            }
            //--------------------- password hashing----------------------

            $userData['password'] = Hash::make($userData['password']);

            //--------------------- Insert User----------------------

            $user = User::create($userData);

            if ($userData['role'] == 'artisan') {
            //--------------------- Insert Artisan----------------------

                $artisan = Artisan::create([
                    'user_id' => $user->id,
                    'description' => $artisanData['description'],
                ]);
                $artisanId =  $artisan->id;

             //--------------------- Insert Images for artisan----------------------

                if ($request->hasFile('multiplePhotos')) {
                    $files = $request->file('multiplePhotos');
                    foreach ($files as $file) {
                        $picturesName = time() . '_' . uniqid() . '.' . $file->extension();
                        $file->storeAs('public/image', $picturesName);
                        image::create([
                            'image' => $picturesName,
                            'artisan_id' => $artisanId,

                        ]);
                    }
                }

                 //--------------------- Insert Jobs for artisan----------------------

                foreach ($artisanData['skills'] as $skill) {
                    artisanCompetence::create([
                        'artisan_id' => $artisanId,
                        'competence' => $skill,

                    ]);
                }

                //--------------------- Insert skills for artisan----------------------

                    artisanJobs::create([
                        'artisan_id' => $artisanId,
                        'job_id' => $artisanData['job_id'],

                    ]);

                auth()->login($user);

                return redirect('/verify');


            } elseif ($userData['role'] == 'client') {
             //--------------------- Insert Clients----------------------

                Admin::create([
                    'user_id' => $user->id,
                    // 'description' => $clientData['description'],
                ]);
                auth()->login($user);

                return redirect('/Client');
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

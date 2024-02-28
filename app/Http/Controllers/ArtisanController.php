<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\artisanCompetence;
use App\Models\artisanJobs;
use App\Models\Competence;
use App\Models\User;
use App\Notifications\AccountUpdate;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;

class ArtisanController extends Controller
{
    public function verify()
    {
        $data = [
            'pageTitle' => 'Verify Required'
        ];
        return view('artisan.verify', $data);
    }

    public function registration(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = [
                'pageTitle' => 'Artisan Registration',
            ];
            return view('artisan.registration', $data);
        }
        else if ($request->isMethod('POST')) {
            // Handle Manual Registration
        }
    }

    public function dashboard (Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = [
                'pageTitle' => 'Artisan Dashboard',
                'artisanData' => Artisan::where('user_id', '=', auth()->id())->get()
            ];
            return view('artisan.dashboard', $data);
        }
    }

    public function professional_profile (Request $request)
    {
        if ($request->isMethod('GET')) {

            $id = DB::table('artisans')
                ->where('user_id', '=', auth()->id())
                ->select('artisans.id')
                ->get();

            $data = [
                'pageTitle' => 'Artisan Professional Profile',
                'artisanDATA' => Artisan::where('user_id', '=', auth()->id())->get()[0],
                'jobs' => \App\Models\job::all(),
                'skills' => Competence::all(),
                'artisanJOBS' => artisanJobs::where('id', '=', $id[0]->id)->get() ?? [],
                'artisanSKILLS' => artisanCompetence::where('id', '=', $id[0]->id)->get() ?? [],
            ];
            return view('artisan.professional', $data);
        }
        else if ($request->isMethod('PATCH')) {

            $incomingDATA = $request->validate([
                'description' => 'required'
            ]);

            Artisan::where('user_id', '=', auth()->id())->update($incomingDATA);
            return back()->with('success', 'Your Profile Information Updated Successfully');
        }
    }

    public function public_profile (Request $request)
    {
        if ($request->isMethod('GET')) {
            $artisan = new Artisan();
            $data = [
                'pageTitle' => 'Artisan Public Profile',
                'userDATA' => $artisan->getArtisanDATA(),
                'cities' => $artisan->moroccanCities()
            ];
            return view('artisan.profile', $data);
        }
        else if ($request->isMethod('PATCH')) {

            $incomingDATA = $request->validate([
                'lname' => 'required',
                'email' => 'required',
                'birthday' => 'required',
                'city' => 'required',
                'Phone' => 'required'
            ]);

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $newName = "img-" . time() . "." . $file->extension();
                $file->move('uploads/artisan/picture/', $newName);
                $incomingDATA['picture'] = $newName;
            }

            User::where('id', '=', auth()->id())->update($incomingDATA);
            User::find(auth()->id())->notify(new AccountUpdate('profile information', 'USER' ));

            return back()->with('success', 'Your Profile Information Updated Successfully');
        }
    }

    public function settings (Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = [
                'pageTitle' => 'Artisan Settings'
            ];
            return view('artisan.settings', $data);
        }
        else if ($request->isMethod('PUT')) {
            $incomingDATA = $request->validate(['password' => 'required|min:8|max:20']);
            $incomingDATA['password'] = password_hash($incomingDATA['password'], PASSWORD_BCRYPT);

            User::where('id', '=', auth()->id())->update($incomingDATA);
            User::find(auth()->id())->notify(new AccountUpdate('password', 'USER' ));
            return back()->with('success', 'Your Password Was Updated Successfully');
        }
        else if ($request->isMethod('DELETE')) {
            User::where('id', '=', auth()->id())->delete();
            auth()->logout();
            session()->invalidate();
            session()->regenerate();
            return redirect('/')->with('success', 'Your Account Was Deleted');
        }
    }

    public function job(Request $request)
    {
        if ($request->isMethod('POST')) {
            $incomingData = $request->validate(['job_id' => 'required',]);
            $incomingData['artisan_id'] = auth()->id();
            artisanJobs::create($incomingData);
            return back();
        }
        else if ($request->isMethod('DELETE')) {

        }
    }
    public function cmp(Request $request)
    {
        if ($request->isMethod('POST')) {
            $incomingData = $request->validate([
                'competence' => 'required',
                'tarif' => 'required',
            ]);
            $incomingData['artisan_id'] = auth()->id();
            artisanCompetence::create($incomingData);
            return back();
        }
        else if ($request->isMethod('DELETE')) {

        }

    }



}

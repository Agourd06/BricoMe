<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\User;
use App\Models\Client;
use App\Models\Artisan;
use App\Models\Competence;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function clientArtisans(Request $request)
    {
        $key = 'artisans_' . implode('_', $request->all());

        $artisans = Cache::remember($key, 60, function () use ($request) {
            $query = Artisan::with('artisanJobs', 'user', 'artisanCompetence')->where('availablity', 'Available');

            if ($request->filled('filterJobs')) {
                $query->whereHas('jobs', function ($jobsQuery) use ($request) {
                    $jobsQuery->where('jobs.id', $request->input('filterJobs'));
                });
            }

            if ($request->filled('filterCompetence')) {
                $query->whereHas('competences', function ($competenceQuery) use ($request) {
                    $competenceQuery->where('competences.id', $request->input('filterCompetence'));
                });
            }

            if ($request->filled('filterCity')) {
                $query->whereHas('user', function ($userQuery) use ($request) {
                    $userQuery->where('users.city', $request->input('filterCity'));
                });
            }

            return $query->get();
        });

        $citys = Artisan::join('users', 'artisans.user_id', '=', 'users.id')
            ->select('users.city')
            ->distinct()
            ->get();

        $jobs = job::all();
        $competences = Competence::all();

        return view('client.Client', [
            'artisans' => $artisans,
            'jobs' => $jobs,
            'competences' => $competences,
            'citys' => $citys,
        ]);
    }

    public function Reserve(Request $request)
    {
        $artisan_id = $request->input('artisan_id');
        $ArtisanData = Artisan::with('artisanJobs', 'user', 'artisanCompetence')
            ->where('user_id', $artisan_id)
            ->firstOrFail();

        return view('client.reserveArtisan', [
            'ArtisanData' => $ArtisanData,
        ]);
    }
    public function confirmReservation(Request $request)
    {
        $reservationData =  $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'adress' => 'required',
            'job' => 'required',
            'skill' => 'required',
            'date' => 'required',
            'city' => 'required',
            'price' => 'required',
            'artisan_id' => '',
        ]);
        $reservationData['client_id'] = Auth::id();
        $clientId = client::where('user_id' , $reservationData['client_id'])->value('id');
       
         reservation::create([
            'artisanName' => $reservationData['fname'] . ' ' . $reservationData['lname'],
            'adress' => $reservationData['adress'],
            'job' => $reservationData['job'],
            'skill' => $reservationData['skill'],
            'date' => $reservationData['date'],
            'city' => $reservationData['city'],
            'price' => $reservationData['price'],
            'client_id' => $clientId,
            'artisan_id' => $reservationData['artisan_id'],
        ]);
       
        return Redirect::route('Reservation');
    }
}

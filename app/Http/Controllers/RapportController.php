<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Client;
use App\Models\Rapport;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{

    public function store(Request $request)
    {
        $request->validate(
            [
                'lname' => 'required',
                'fname' => 'required',
                'email' => 'required|email',
                'message' => 'required|string | max:300',
            ],
            [
                'lname.*' => 'error lname',
                'fname.*' => 'error fname',
                'email.*' => 'error email',
                'message.*' => 'error message',

            ]

        );

        $user_id = Auth::id();

        Rapport::create([
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'artisanName' => $request->input('artisanName'),
            'user_id' =>
            $user_id,
        ]);

        return redirect('/reporting')->with('success', 'Report submitted successfully!');
    }
    public function reporterData(Request $request)
    {

        $userid = Auth::id();
        $clientData = Client::with('user')->where('user_id', $userid)->first();
        $artisanData = Artisan::with('user')->where('id', $request->input('artisan_id'))->first();
       $artisans = Artisan::with('user')->get();
        $ReservTotal = reservation::count();

        return view('client.repport', [
            'clientData' => $clientData,
            'ReservTotal' => $ReservTotal,
            'artisanData' => $artisanData,
            'artisans' => $artisans,
        ]);
    }

}

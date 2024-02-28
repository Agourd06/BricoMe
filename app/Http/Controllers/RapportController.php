<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Rapport;
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
            'user_id' =>
            $user_id,
        ]);

        return redirect('/reporting')->with('success', 'Report submitted successfully!');
    }
    public function reporterData()
    {

        $userid = Auth::id();
        $clientData = Client::with('user')->where('user_id', $userid)->first();
       

        return view('client.repport', [
            'clientData' => $clientData,
        ]);
    }

}

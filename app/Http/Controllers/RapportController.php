<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
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
    
 
}

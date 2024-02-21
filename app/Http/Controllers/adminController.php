<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
   public function NewJob(Request $request){
    $data = $request->validate();
   }
}

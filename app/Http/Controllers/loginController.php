<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
        $authenticatedUser = auth()->user();

        if ($authenticatedUser->Artisan) {
            return redirect('/verify');
        }
        
        if ($authenticatedUser->Client) {
            return redirect('/Client');
        }
        
        if ($authenticatedUser->Admin) {
            return redirect('/admin');
        }

        return redirect('/');
    } else {
        return redirect('/')
            ->withErrors(['login' => 'Invalid credentials'])
            ->withInput();
    }
}
public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

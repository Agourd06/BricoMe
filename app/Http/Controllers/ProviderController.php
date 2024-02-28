<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\User;
use App\Notifications\AccountCreation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $social = Socialite::driver('github')->user();

        try {
            $user = User::updateOrCreate([
                'provider_id' => $social->id,
                'provider' => "github",
                'provider_token' => $social->token
            ], [
                'lname' => $social->name,
                'username' => uniqid(mt_rand(), true) . '-' . time(),
                'email' => $social->email,
                'Profil' => $social->avatar,
                'type' => "artisan",
            ]);

            if ($user) {
                $user->notify(new AccountCreation($user['name'], $user['email']));
                event(new Registered($user));
                auth()->login($user);
                session()->regenerate();
                Artisan::create(['user_id' => \auth()->id()]);
                return redirect('/artisan/profile/public')->with('success', 'Your Account Was Created, You Just Need To Complete Your Informations');
            } else {
                return back()->with('error', 'Error Registering New User !!');
            }

        } catch (\Exception $e) {dd($e->getMessage());}
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\User;
use App\Models\Artisan;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(6)->create();
        Artisan::factory(2)->create();
        Client::factory(2)->create();
        Admin::factory(2)->create();
    }
}


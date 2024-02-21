<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\job;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function NewJob(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        job::create($data);

        return redirect('/admin');
    }

    public function NewComeptences(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'id_job' => 'required',
        ]);

        Competence::create($data);

        return redirect('/admin');
    }
    public function adminPage()
    {
        $jobCount = job::count();
        $competenceCount = Competence::count();

        $jobs = job::all();
$competences = Competence::with('job')->get();
        return view('Admin.dashBoard', [
            'jobs' => $jobs,
            'competences' => $competences,
            'jobCount' => $jobCount,
            'competenceCount' => $competenceCount,
        ]);
    }
}

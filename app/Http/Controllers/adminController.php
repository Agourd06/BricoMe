<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\Client;
use App\Models\Artisan;
use App\Models\Competence;
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
    public function adminPage(Request $request)
    {
        $jobId = $request->input('job_id');
        $competence_id = $request->input('competenceId');


        // ----------Count jobs-----------------
        $jobCount = job::count();


        // ----------Count jobs-----------------
        $Artisans = Artisan::count();


        // ----------Count jobs-----------------
        $Clients = Client::count();


        // ----------Count Competences-----------------
        $competenceCount = Competence::count();


        // ----------Edit Jobs-----------------
        $editeJob = job::where('id', $jobId)->first();


        // ----------Edit Competence-----------------

        $editeCompetence = Competence::where('id', $competence_id)->first();
        //------------- Show Admin Data-------------
        $jobs = job::all();
        $competences = Competence::with('job')->get();
        return view('Admin.dashBoard', [
            'jobs' => $jobs,
            'competences' => $competences,
            'jobCount' => $jobCount,
            'editeJob' => $editeJob,

            'editeCompetence' => $editeCompetence,
            'competenceCount' => $competenceCount,
        ]);
    }
    public function UsersAdmin()
    {
        // ----------------userAdmin data----------------
        $artisans = Artisan::with('artisanJobs', 'user' )->get();
        
        $Clients = Client::with('user')->get();
        return view('Admin.Users', [
            'artisans' => $artisans,
            'clients' => $Clients,
        ]);
    }
    public function archive(Request $request)
    {

        $competenceId =  $request->input('competence_id');
        $ArchiveCom =  $request->input('archiveCom');
        $jobId =  $request->input('job_id');
        $Archive =  $request->input('archiveJob');
        if ($competenceId !== null) {
            Competence::where('id', $competenceId)
                ->update([
                    'statut' => $ArchiveCom,

                ]);
        }

        if ($jobId !== null) {
            job::where('id', $jobId)
                ->update([
                    'statut' => $Archive,

                ]);
        }



        return redirect('/admin');
    }
    public function updateJob(Request $request)
    {

        $NameJob =  $request->input('name');
        $jobId =  $request->input('job_id');
        job::where('id', $jobId)
            ->update([
                'name' => $NameJob,

            ]);
        return redirect('/admin');
    }
    public function updateCompetence(Request $request)
    {

        $CompName =  $request->input('name');
        $CompetenceId =  $request->input('IdCompetence');
        Competence::where('id', $CompetenceId)
            ->update([
                'name' => $CompName,

            ]);
        return redirect('/admin');
    }
}

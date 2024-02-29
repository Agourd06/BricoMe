<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\Client;
use App\Models\Artisan;
use App\Models\Competence;
use App\Models\Rapport;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\View\ViewException;

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
        $reclamationCount = Rapport::count();

        return view('Admin.dashBoard', [
            'jobs' => $jobs,
            'competences' => $competences,
            'jobCount' => $jobCount,
            'editeJob' => $editeJob,
            'reclamationCount' => $reclamationCount,

            'editeCompetence' => $editeCompetence,
            'competenceCount' => $competenceCount,
        ]);
    }
    public function UsersAdmin()
    {
        // ----------------userAdmin data----------------
        $artisans = Artisan::with('artisanJobs', 'user')->get();
        $reclamationCount = Rapport::count();

        $Clients = Client::with('user')->get();
        return view('Admin.Users', [
            'artisans' => $artisans,
            'clients' => $Clients,
            'reclamationCount' => $reclamationCount,
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
    public function archiveUser(Request $request)
    {
        $archiveValue = $request->input('archiveUs');
        if ($request->input('role') == 'client') {
            Client::where('id', $request->input('client_id'))
                ->update([
                    'statut' => $archiveValue,

                ]);
        }
        if ($request->input('role') == 'artisan') {
            Artisan::where('id', $request->input('artisan_id'))
                ->update([
                    'statut' => $archiveValue,

                ]);
        }
        return redirect('/adminUsers');
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

    public function reclamation()
    {
        $reclamations = Rapport::all();
        $reclamationCount = Rapport::count();
        return View('Admin.ReclamNotif', [
            'reclamations' => $reclamations,
            'reclamationCount' => $reclamationCount,
        ]);
    }
    public function deletRepport(Request $request)
    {
        Rapport::destroy($request->input('repport_id'));
        return redirect('/ReclamNotif')->with('success', 'Reclamation Deleted Successfully');
    }
    public function AcceptJob()
    {
        $reclamationCount = Rapport::count();
        return view('Admin.addJob', ['reclamationCount' => $reclamationCount,]);
    }
}

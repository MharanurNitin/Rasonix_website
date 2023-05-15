<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Job_applicant;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        return view('career');
    }
    //for singal job
    public function findJob($id)
    {
        return Career::find($id);
    }
    //for all jobs
    public function allJobs()
    {
        return Career::all();
    }
    //singal job all applicants
    public function getApplicant($id)
    {
        return Career::find($id)->applicants;
    }
}

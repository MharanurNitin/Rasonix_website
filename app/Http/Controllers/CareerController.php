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
    public function findJob($id)
    {
        return Career::find($id);
    }
    public function allJobs()
    {
        return Career::all();
    }
    public function getApplicant($id)
    {
        return Career::find($id)->applicants;
    }
}

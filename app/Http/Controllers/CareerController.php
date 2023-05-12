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

    public function getApplicant($id)
    {
        return Career::find($id)->applicants;
        // return Career::all();
    }
}

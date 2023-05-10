<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Job_applicant;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        return Career::find(1)->applicants;

        // return $jobs;
    }
}

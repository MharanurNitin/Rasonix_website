<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Job_applicant;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function index()
    {
        $jobs = Career::all();
        return view('form.applyjob', compact('jobs'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'career_id' => 'required',
            'resume' => 'required|mimes:pdf,png,jpeg,jpg',
            'phone no' => 'require|min:8|max:14',
            'email' => 'required|email',
            'gender' => 'required',
        ]);
        $applicant = new Job_applicant();
        $applicant->name = $request->name;
        $applicant->career_id = $request->career_id;
        if ($request->hasfile('resume')) {
            $file = $request->file('resume');
            $filename = rand() . '.' . $file->getClientOriginalExtension();
            $file->move('document/applicants/', $filename);
            $applicant->resume = $filename;
        }
        $applicant->phone_no = $request->phone_no;
        $applicant->email = $request->email;
        $applicant->gender = $request->gender;


        $applicant->save();
        session()->flash('message', 'your application submitted successfully.');
        return redirect()->back();
    }
}

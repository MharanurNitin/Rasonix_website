<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Job_applicant;
use Illuminate\Support\Facades\Storage;


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
    public function add_jobs()
    {   $categories = Category::all() ;
        return view('admin_views.admin.add_jobs',['categories'=> $categories]);
    }
    public function view_jobs()
    {
        $career = Career::all() ;
        return view('admin_views.admin.view_jobs',['career'=> $career]);
    }
    public function store_jobs(Request $request)
    {


    // Save the document
         $document = new Career();
         $document->title = $request['title'];
         $document->description = $request['description'];
         $document->categories_id = $request['categories_id'];
         $document->updated_by = 1;
         // Handle file upload
         if ($request->hasfile('document')) {
        $file = $request->file('document');
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $file->move('document/jobs/', $filename);
        $document->document = $filename;
         }

         $document->save();

         return redirect('admin/add-jobs')->with('success', 'Document added successfully!');

    }
    public function edit_jobs($id)
    {
        $career = Career::find($id);
        return view('admin_views.admin.edit_jobs',compact('career'));
    }

    // public function destroy($id)
    // {
    //     $career = Career::find($id);
    //     if($career)
    //     {
    //         $destination = 'document/jobs/'.$career->document;
    //         if(File::exists($destination)){
    //             File::delete($destination);
    //         }
    //         $career->delete();
    //         return redirect('admin/view-jobs')->with('message', 'Category Deleted successfully');
    //     }
    //     else
    //     {
    //         return redirect('admin/view-jobs')->with('message', 'No Category Id Found');
    //     }

    // }

    public function destroy($id)
{
    $career = Career::find($id);

    if ($career) {
        // Check if the career has a document file and delete it if it exists
        if ($career->document && Storage::disk('public')->exists($career->document)) {
            Storage::disk('public')->delete($career->document);
        }

        // Delete the career model
        $career->delete();

        return redirect('admin/view-jobs')->with('message', 'Career deleted successfully');
    } else {
        return redirect('admin/view-jobs')->with('message', 'Career not found');
    }
}
}

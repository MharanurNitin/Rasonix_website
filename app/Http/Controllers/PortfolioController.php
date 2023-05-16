<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   public function add_protfolio()
   {
    return view('admin_views.admin.add_protfolio');
   }

   public function view_protfolio()
   {
    $portfolios = Portfolio::all();
    return view('admin_views.admin.view_portfolio',compact('portfolios'));
   }

   public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'nullable|string',
            'status' => 'in:visible,hidden',
        ]);

        // Create a new portfolio record
        $portfolio = Portfolio::create($validatedData);

        // Optionally, you can perform additional actions such as file upload, notifications, etc.

        // Redirect or return a response
        return redirect()->route('add-portfolio')->with('success', 'Portfolio created successfully!');
    }
    public function edit_portfolio( $id)
    {    $portfolio = Portfolio::find($id);
        return view('admin_views.admin.edit_protfolio', compact('portfolio'));
    }

    public function update_portfolio(Request $request, $id)
    {
        // $portfolio = Portfolio::find($id);
        //  // Validate the form data
        //  $validatedData = $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //     'image_url' => 'nullable|string',
        //     'status' => 'in:visible,hidden',
        // ]);

        // // Update the portfolio record
        // $portfolio->update_portfolio($validatedData);

        // // Optionally, you can perform additional actions such as file upload, notifications, etc.

        // // Redirect or return a response
        // return redirect()->route('view-portfolio')->with('success', 'Portfolio updated successfully!');


        $portfolio = Portfolio::find($id);

        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'nullable|string',
            'status' => 'in:visible,hidden',
        ]);

        // Update the portfolio record
        $portfolio->fill($validatedData)->save();

        // Optionally, you can perform additional actions such as file upload, notifications, etc.

        // Redirect or return a response
        return redirect()->route('view-portfolio')->with('success', 'Portfolio updated successfully!');
    }
    public function destroy($id)
    {
        // Delete the portfolio record
        $portfolio = Portfolio::find($id);
        $portfolio->delete();

        // Redirect or return a response
        return redirect()->route('view-portfolio')->with('success', 'Portfolio deleted successfully!');
    }
}

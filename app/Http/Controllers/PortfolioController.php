<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   public function add_protfolio()
   {
    return view('admin_views.admin.add_protfolio');
   }

   public function edit_protfolio()
   {
    return view('admin_views.admin.edit_protfolio');
   }
}

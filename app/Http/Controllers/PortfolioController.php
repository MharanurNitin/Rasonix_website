<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   public function add_protfolio()
   {
    return view('admin_views.admin.add_protfolio');
   }

   public function view_protfolio()
   {
    return view('admin_views.admin.view_portfolio');
   }
}

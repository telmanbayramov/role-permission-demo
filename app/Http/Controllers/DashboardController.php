<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
class DashboardController extends Controller
{
    public function dashboard()
    {
            
        return view('panel.dashboard'); 
    }
}

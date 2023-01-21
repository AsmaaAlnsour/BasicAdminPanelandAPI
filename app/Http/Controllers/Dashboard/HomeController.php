<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('Dashboard.home');
    }
}

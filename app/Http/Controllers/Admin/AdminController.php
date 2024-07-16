<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Reservation;

use App\Models\Reviews;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

}


<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyreservationsController extends Controller
{
    public function index()
    {
        // Get the authenticated user's email
        $userEmail = Auth::user()->email;

        // Fetch reservations for the authenticated user
        $reservations = Reservation::where('email', $userEmail)->get();

        // Pass the reservations to the view
        return view('customer.myreservations.index', compact('reservations'));
    }
}


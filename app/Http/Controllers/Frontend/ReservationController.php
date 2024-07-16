<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationSetting;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');


        $settings = ReservationSetting::first(); // Fetch settings from database


        // Example default values if $settings or its attributes are null
        $min_date = $settings ? Carbon::parse($settings->min_date) : Carbon::now();
        $max_date = $settings ? Carbon::parse($settings->max_date) : Carbon::now()->addWeek();

        return view('reservations.step-one', compact('settings', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
        ]);

        // Store reservation in session
        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
        } else {
            $reservation = $request->session()->get('reservation');
        }

        $reservation->fill($validated);
        $request->session()->put('reservation', $reservation);

        return redirect()->route('reservations.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');

        // Retrieve reservation settings from database
        $settings = ReservationSetting::first();

        // Retrieve reservation date from session and find existing reservations for that date
        $reservations = Reservation::whereDate('res_date', $reservation->res_date->format('Y-m-d'))
            ->pluck('table_id');

        // Retrieve tables available based on admin settings and reservation constraints
        $tables = Table::where('status', TableStatus::Avalaiable)
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $reservations)
            ->get();

        return view('reservations.step-two', compact('reservation', 'tables', 'settings'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);

        // Store selected table in reservation and save
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();

        // Clear reservation from session after saving
        $request->session()->forget('reservation');

        return redirect()->route('thankyou');
    }
}

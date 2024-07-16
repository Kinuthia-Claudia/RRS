<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\ReservationSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::query();

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $reservations = $query->get();
        $settings = ReservationSetting::first();
        return view('admin.reservations.index', compact('reservations', 'settings'));
    }

    public function create()
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }
        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        $reservation->update($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservations.index')->with('warning', 'Reservation deleted successfully.');
    }

    public function changeStatus($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $reservation->status == 'closed' ? 'open' : 'closed';
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation status updated successfully.');
    }

    public function updateSettings(Request $request)
    {
        $settings = ReservationSetting::first();
        if (!$settings) {
            $settings = new ReservationSetting();
        }

        // Handle null values gracefully
        $settings->min_date = $request->min_date ?? null;
        $settings->max_date = $request->max_date ?? null;
        $settings->save();

        return back()->with('success', 'Reservation settings updated successfully.');
    }

    public function settings()
    {
        $settings = ReservationSetting::first();
        return view('admin.reservations.index', compact('settings'));
    }
}

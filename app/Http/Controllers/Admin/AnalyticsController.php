<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Reviews;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Example: Get reservation counts per day of the week
        $reservations = Reservation::selectRaw('DAYOFWEEK(res_date) as day_of_week, COUNT(*) as count')
            ->groupBy('day_of_week')
            ->orderBy('day_of_week')
            ->get();

        // Map days of the week to human-readable format
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $labels = [];
        $data = [];

        foreach ($reservations as $reservation) {
            $labels[] = $daysOfWeek[$reservation->day_of_week - 1];
            $data[] = $reservation->count;
        }

        // Guest data for the pie chart
        $guestData = Reservation::selectRaw('guest_number, COUNT(*) as count')
            ->groupBy('guest_number')
            ->orderBy('guest_number')
            ->get();

        $guestLabels = $guestData->pluck('guest_number');
        $guestCounts = $guestData->pluck('count');

        // Hourly distribution
        $hourlyReservations = Reservation::selectRaw('HOUR(res_date) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        $hourlyLabels = $hourlyReservations->pluck('hour');
        $hourlyCounts = $hourlyReservations->pluck('count');

        // Daily peak times
        $dailyReservations = Reservation::get()->groupBy(function($date) {
            return Carbon::parse($date->res_date)->format('l');
        })->map(function ($day) {
            return $day->groupBy(function ($time) {
                return Carbon::parse($time->res_date)->format('H');
            })->map(function ($hour) {
                return $hour->count();
            });
        });

        $dailyPeakLabels = collect(['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']);
        $dailyPeakDatasets = [];
        foreach ($dailyReservations as $day => $hours) {
            $dailyPeakDatasets[] = [
                'label' => $day,
                'data' => $dailyPeakLabels->map(function ($hour) use ($hours) {
                    return $hours->get($hour, 0);
                }),
                'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                'borderColor' => 'rgba(153, 102, 255, 1)',
                'borderWidth' => 1,
                'fill' => false,
            ];
        }

        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $totalReviews = Reviews::count();
        $averageRating = Reviews::avg('rating');
        $reservationsToday = Reservation::whereDate('created_at', now()->toDateString())->count();
        $reservationsThisWeek = Reservation::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $reservationsThisMonth = Reservation::whereMonth('created_at', now()->month)->count();

        // Pass all necessary data to the view
        return view('admin.analytics.index', compact('labels', 'data', 'guestLabels', 'guestCounts', 'hourlyLabels',
         'hourlyCounts', 'dailyPeakLabels', 'dailyPeakDatasets', 'totalUsers', 'totalReservations', 'totalReviews',
          'averageRating', 'reservationsToday', 'reservationsThisWeek', 'reservationsThisMonth'));
    }

}

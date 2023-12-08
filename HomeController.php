<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Laboratory;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $bookings = Booking::count();
        $laboratories = Laboratory::count();
        $users = User::count();

        $monthlyBookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupByRaw('MONTH(created_at)')
            ->get();

        $monthlyChartLabels = $monthlyBookings->map(function ($item) {
            return Carbon::create()->month($item->month)->format('F');
        });

        $monthlyChartData = $monthlyBookings->pluck('count');

        return view('dashboard', compact('bookings', 'laboratories', 'users', 'monthlyChartLabels', 'monthlyChartData'));
    }
}

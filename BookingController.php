<?php

// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Existing methods...

    public function index()
    {
        $bookings = Booking::with('laboratory')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function accept(Booking $booking)
    {
        // Logic to mark the booking as accepted, update status, etc.
        $booking->update(['status' => 'accepted']);

        return redirect()->route('bookings.index')->with('success', 'Booking accepted successfully!');
    }

    public function reject(Booking $booking)
    {
        // Logic to mark the booking as rejected, update status, etc.
        $booking->update(['status' => 'rejected']);

        return redirect()->route('bookings.index')->with('success', 'Booking rejected successfully!');
    }


    public function create()
    {
        $laboratories = Laboratory::all();
        return view('bookings.create', compact('laboratories'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'labs_id' => 'required|exists:laboratories,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Create a new booking
        $booking = auth()->user()->bookings()->create($request->all());

        return redirect()->route('bookings.show', $booking->id)
            ->with('success', 'Booking created successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function userRegistrations(Event $event)
    {
        $registrations = $event->registrations;
        return view('admin.events.registrations', compact('event', 'registrations'));
    }
    public function index()
    {
        $events = Event::where('event_date', '>=', now())
            ->where('event_date', '<=', now()->addDays(15))
            ->orderBy('event_date', 'asc')
            ->get();

        return view('home', compact('events'));
    }

    // Display details of a specific event along with the registration form
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Handle user registration for an event
    public function register(Request $request, Event $event)
    {
        // Validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);

        // Check if event has available spots
        if ($event->registrations->count() >= $event->max_attendees) {
            return redirect()->back()->with('error', 'Registration is full for this event.');
        }

        // Save the registration data
        Registration::create([
            'event_id' => $event->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('events.show', $event)->with('success', 'You have successfully registered for the event!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $validatedData = $request->validate([
            'ticket_type' => 'required',
        ]);

        $event=Event::find($eventId);

        $reservation = new Reservation();
        $reservation->event_id = $eventId;
        $reservation->user_id = Auth::id();
        if($event->acceptation==1){
            $reservation->status = 'confirmed';
        }
        else{
            $reservation->status='pending';
        }
        $reservation->reservation_code = str()->random(10);
        $reservation->ticket_type_id = $validatedData['ticket_type'];
        $event->available_seats=  $event->available_seats - 1;
        $event->save();
        $reservation->save();

        return redirect()->back()->with('success', 'Réserved');
    }


    public function cancel(Reservation $reservation)
{
    $currentUser = Auth::user();

    if ($reservation->user_id !== $currentUser->id) {
        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
    }

    $reservation->status = 'cancelled';
    $reservation->save();

    $event = $reservation->event;
    $event->available_seats += 1 ;
    $event->save();

    return redirect()->back()->with('success', 'Canceled');
}
    public function reReserver(Reservation $reservation)
{
    $currentUser = Auth::user();

    if ($reservation->user_id !== $currentUser->id) {
        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à Re reservé cette réservation.');
    }

    $reservation->status = 'pending';
    $reservation->save();

    $event = $reservation->event;
    $event->available_seats -= 1;
    $event->save();

    return redirect()->back()->with('success', 'Re Reserved.');
}
}


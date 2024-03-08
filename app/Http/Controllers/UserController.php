<?php 

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function showUserReservations()
{
    $user = Auth::user();
    $events = Event::all();
    $reservations = $user->reservations()->get();
    $CountReservation = $user->reservations()->count();

    return view('profiles.Reservations', compact('reservations','events'));
}

    public function showuser(User $user)
    {
        $events = Event::all();
        $user = User::where('id', $user->id)->first();
        $CountReservation = $user->reservations()->count();
        return view('profiles.profile', compact('user','events','CountReservation'));
    }

    public function edituser()
{
    $user = auth()->user();
    return view('profiles.edit', compact('user'));
}

public function updateuser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'bio' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect(route('profiles.profile', Auth::user()))->with('success', 'Profile updated');
    }

    
    
}
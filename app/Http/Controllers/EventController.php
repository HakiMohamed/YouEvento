<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket_types;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::inRandomOrder()->paginate(10);
        $ticketTypes = Ticket_types::all();
        return view('main.index', compact('events','ticketTypes','categories'));
    }

    public function showUserEvents(User $user)
    {
        $ticketTypes = Ticket_types::all();
        $events = $user->Events()->orderByDesc('created_at')->get();
        return view('main.index', compact('events','ticketTypes'));
    }

    public function create()
    {
        $events = Event::paginate(10);
        $categories = Category::all();
    return view('main.create', compact('categories','events'));
    }

    public function store(Request $request)
    {

        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'available_seats' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'acceptation' => 'nullable',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/events'), $imageName);
            $validatedData['image'] = 'images/events/' . $imageName;
        }
        
        $validatedData['user_id'] = Auth::id();
        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'created');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $ticketTypes = Ticket_types::all();
        return view('main.show', compact('event','ticketTypes'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('main.edit', compact('event'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'available_seats' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
        'acceptation' => 'nullable',
    ]);

    $event = Event::findOrFail($id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/events'), $imageName);
        $validatedData['image'] = 'images/events/' . $imageName;
    }

    $event->update($validatedData);

    return redirect()->route('events.index')->with('success', 'updated');
}


    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'deleted');
    }




    public function search(Request $request)
{
    $search = $request->input('search');

    $categoryIds = $request->input('categories');

    $eventsQuery = Event::query();

    if ($search) {
        $eventsQuery->where('title', 'LIKE', "%$search%");
    }

    if ($categoryIds) {
        $eventsQuery->whereHas('category', function ($query) use ($categoryIds) {
            $query->whereIn('id', $categoryIds);
        });
    }

    $events = $eventsQuery->paginate(10);

    $categories = Category::all();
    $ticketTypes = Ticket_types::all();

    return view('main.index', compact('events', 'categories','ticketTypes'));
}
}

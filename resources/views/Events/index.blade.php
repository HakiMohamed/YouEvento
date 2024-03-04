@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded my-6">
            <div class="flex justify-between items-center border-b border-gray-200 p-6">
                <h2 class="text-2xl font-semibold text-gray-800">Events</h2>
                <a href="{{ route('events.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create Event</a>
            </div>
            <div class="p-6">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Title</th>
                            <th class="text-left py-2">Description</th>
                            <th class="text-left py-2">Date</th>
                            <th class="text-left py-2">Location</th>
                            <th class="text-left py-2">Available Tickets</th>
                            <th class="text-left py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr class="border-b">
                                <td class="py-2">{{ $event->title }}</td>
                                <td class="py-2">{{ $event->description }}</td>
                                <td class="py-2">{{ $event->date }}</td>
                                <td class="py-2">{{ $event->location }}</td>
                                <td class="py-2">{{ $event->available_tickets }}</td>
                                <td class="py-2">
                                    <a href="{{ route('events.show', $event->id) }}" class="text-blue-500 hover:text-blue-600 mr-2">View</a>
                                    <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 hover:text-yellow-600 mr-2">Edit</a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

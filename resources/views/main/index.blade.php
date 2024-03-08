@extends('layouts.app')

@section('content')
<div class=" container-xl lg:mt-[80px] mt-[120px] dark:text-white" >
    <div class="space-y-4">
        
        
        






        <form action="{{ route('events.search') }}" class=" mx-1">
            <div class="flex">
                
                <select id="dropdown-button" name="categories[]" id="dropdown" class="z-10  bg-white border-none    dark:bg-[#242526]">
                    <option class="ml-12" value=""hidden disabled selected>Catégories</option>
                    @foreach ($categories as $category)
                    <option class="w-20 text-center" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="relative w-full">
                    <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-[#242526] dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Events, categories..." />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        











        

        @if($events->isEmpty())
            <div class="rounded mt-3 shadow-md bg-[#FFFFFF] dark:bg-[#242526]">
                <div class="p-4">
                    <h1 class="text-gray-900 dark:text-white">Aucun événement trouvé!</h1>
                </div>
            </div>
        
        @else
        @foreach($events as $event)
        <div class="rounded flex flex-col md:flex-row shadow-md lg:w-[680px] bg-[#FFFFFF] dark:bg-[#242526]">
            <div class="h-full md:w-[350px] relative ">
                @if($event->image)
                    <img src="{{ asset($event->image) }}" class="object-cover w-full h-full rounded-r" alt="Event Image">
                @else
                    <img src="{{ asset('images/events/defimage.webp') }}" class="mt-5 object-cover w-full h-full rounded-r" alt="Default Event Image">
                @endif
                <div class="absolute top-0 right-0 mt-2 mr-2 bg-gray-800 text-white text-xs font-semibold px-2 py-1 rounded">
                    {{ $event->category->name }}
                </div>
            </div>
            <div class="p-4 md:w-[350px]">
                <h2 class="text-xl">{{ $event->title }}</h2>
                <p class="text-gray-500 dark:text-gray-300"><i class="fa-solid fa-clock"></i>   {{ $event->date }}</p>
                <p class="text-gray-500 dark:text-gray-300"><i class="fa-solid fa-location-dot"></i>  {{ $event->location }}</p>
                <p class="text-gray-500 dark:text-gray-300"> <i class="fa-solid fa-ticket"></i> Available Seats: {{ $event->available_seats }}</p>
                <div class="mt-4 ">
                    <form action="{{ route('reservations.store', $event->id) }}" method="POST" class="max-w-md mx-auto">
                        @csrf
                        <div class="mt-4">
                            <label for="ticket_type" class="block text-sm font-medium text-gray-700 dark:text-white"><i class="fa-solid fa-layer-group"></i> Ticket Type</label>
                            <select id="ticket_type" name="ticket_type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-[#242526] dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="" disabled selected hidden>Select a ticket type</option>
                                @foreach($ticketTypes as $ticketType)
                                    <option value="{{ $ticketType->id }}" class="py-2 px-4 bg-gray-100 hover:bg-gray-200 dark:bg-[#242526] dark:hover:bg-gray-600">{{ $ticketType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4 mb-4">
                            @auth
                                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Book your ticket</button>
                            @else
                                <a href="{{ route('login') }}" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login to book your ticket</a>
                            @endauth
                        </div>
                    </form>
                    <a href="{{ route('events.show', $event->id) }}" class="mt-2 w-full py-1 px-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">more <i class="fa-solid fa-circle-info"></i></a>
                </div>
            </div>
            
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="mt-[120px] lg:mt-20 md:mt-25 mb-12  max-h-screen container-xl dark:text-white ">
    <div class="rounded shadow-md border dark:bg-[#242526]">
        @if ($reservations->isEmpty())
            <p>Aucune réservation pour le moment.</p>
        @else
            @foreach ($reservations as $reservation)
            <hr>
                <div class="flex lg:w-[680px]  justify-between px-5  " >
                    <div class="flex items-center ">
                        <div class="flex rounded-lg  p-4">
                            @if(isset($reservation->event->image))
                            <img src="{{ asset($reservation->event->image) }}"
                            alt="User" class="w-8 h-8 rounded-none-full mr-2"> 
                            @else 
                            <img src="{{ asset('images/events/defimage.webp') }}"
                            alt="User" class="w-8 h-8 rounded-none-full mr-2">  
                            @endif

  
                            <h2 class="text-xl">{{ $reservation->event->title }}</h2>
                        </div>
                        <p class="text-gray-600">{{ $reservation->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="mt-5 ms-3">
                        <div class="h-16  select-none rounded-b flex text-center items-center justify-around  dark:bg-[#242526]">
                            <div class="flex justify-end ">
                                @if($reservation->status==='pending')
                                <span>pending <i class="fa-solid fa-spinner fa-spin fa-lg"></i></span>
                                @elseif($reservation->status==='confirmed')
                                <span>Accepted <i class="fa-regular fa-circle-check  fa-lg" style="color: #14ea10;"></i></span>
                                @else
                                <span>Canceled <i class="fa-solid fa-ban fa-shake fa-lg" style="color: #f40606;"></i></span>
                                @endif
                            </div>
                        </div>
                    </div>


                    

                </div>
                <p class="text-sm top-0 right-0">Reservation Code: {{ $reservation->reservation_code }}</p>
                @if($reservation->status=='pending'|| $reservation->status=='confirmed')

                <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" class="max-w-md right-0 top-0  mx-auto">
                    @csrf
                    @method("PUT")
                    <div class="mt-4 mb-4">
                        @auth
                        <button type="submit" class="px-3 py-1 end border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel <i class="fa-solid fa-calendar-xmark"></i></button>
                        @endauth
                    </div>
                </form>
                @else
                <form action="{{ route('reservations.reReserver', $reservation->id) }}" method="POST" class="max-w-md right-0 top-0  mx-auto">
                    @csrf
                    @method("POST")
                    <div class="mt-4 mb-4">
                        @auth
                        <button type="submit" class="px-3 py-1 end border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ré Réservé <i class="fa-solid fa-calendar-check"></i></button>
                        @endauth
                    </div>
                </form>

                @endif



            @endforeach
        @endif
    </div>
    
</div>
@endsection

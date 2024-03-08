{{-- bars.blade.php --}}

<div class="shadow rounded container-xl flex justify-between ">
    {{--left-sidebar--}}
    
    <div id="left-sidebar" class="leftsid shadow fixed rounded select-none h-full left-0 top-16 hidden md:block dark:border-white z-20 ">
        <div class="h-full lg:w-70  py-2 pb-4 overflow-y-auto bg-[#F0F2F5] dark:bg-[#18191A]">
            <ul class="space-y-2 font-medium">
                <div class="text-center w-full mb-5 mt-2">
                    <h1 class="font-[600] text-[17px] text-[#65676B] dark:text-[#B0B3B8]">Actions</h1>
                </div>
                @guest
                <li class="text-center">
                    <span class="text-dark ml-12 dark:text-white">Log in to view profile!</span>
                </li>
                @endguest
                
                @auth
                <a href="{{ route('profiles.profile', Auth::user()) }}"
                class="flex mx-1 items-center ml-6 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#E4E6E9] dark:hover:bg-[#303031] group">
                <i class="fa-solid fa-user"></i><span class="mx-7">MY PROFILE</span>
            </a>
                <a href="{{ route('events.create') }}"
                class="flex mx-1 items-center ml-6 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#E4E6E9] dark:hover:bg-[#303031] group">
                <i class="fa-solid fa-calendar-plus"></i><span class="mx-7">CREATE EVENT</span>
            </a>
            
            </a>
                <a href="{{ route('events.user', ['user' => Auth::user()]) }}"
                class="flex mx-1 items-center ml-6 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#E4E6E9] dark:hover:bg-[#303031] group">
                <i class="fa-solid fa-layer-group"></i><span class="mx-7">MY EVENTS</span>
            </a>
            </a>
                <a href="{{ route('user.reservations', ['user' => Auth::user()]) }}"
                class="flex mx-1 items-center ml-6 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#E4E6E9] dark:hover:bg-[#303031] group">
                <i class="fa-solid fa-receipt"></i><span class="mx-7">MY RESERVATIONS</span>
            </a>


                @endauth
               
                
            </ul>
        </div>
    </div>
    {{--right-sidebar--}}
    
    <div id="right-sidebar" class="fixed z-20 rounded select-none justify-self-end h-full right-0 top-16 bg-[#F0F2F5] dark:bg-[#18191A] hidden md:block overflow-y-scroll dark:text-white border-gray-600 dark:border-white">
        <div class="rounded lg:w-60 md:w-full p-4 mb-5 text-center ">
            <ul>
            @guest
            <li class="text-center list-none font-medium mt-[21px]">
                <span class="text-dark dark:text-white">Log in to use this feature!</span>
            </li>
           @endguest
            @auth
            
            <h2 class="font-[600] text-[17px] text-[#65676B] dark:text-[#B0B3B8] mb-2">Suggested for you</h2>
            
                        
            @foreach($events as $event)
    <li class="text-gray-700 shadow dark:bg-[#11191A] rounded bg-white text-black dark:text-white  hover:shadow-2xl-indigo-500/50 my-3 mr-3 dark:text-gray-100 transition duration-300 ease-in-out">
        <a href="{{ route('events.show', $event->id) }}">
            <strong class="text-gray-900 dark:text-white text-[17px]"> {{ $event->title }}</strong>
            <p class="text-gray-700 dark:text-white"><i class="fa-solid fa-clock"></i> {{ $event->date }}</p>
            <p class="text-gray-700 dark:text-white"><i class="fa-solid fa-location-dot"></i> {{ $event->location }}</p>
            <p class="text-gray-700 dark:text-white"><i class="fa-solid fa-ticket"></i> Available Seats: {{ $event->available_seats }}</p>
        </a>
        
    </li>
    <span class="text-gray-700 dark:text-gray-500"><hr></span>
    
@endforeach
@endauth
               
            </ul>
        </div>
    </div>
    
</div>
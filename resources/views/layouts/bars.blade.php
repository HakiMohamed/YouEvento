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
<<<<<<< HEAD
    
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
    
=======
    <div id="right-sidebar" class="fixed select-none justify-self-end h-full right-0 mt-[65px] bg-[#F0F2F5] dark:bg-[#18191A] hidden md:block overflow-y-scroll dark:text-white border-gray-600 dark:border-white">
        <div class="rounded lg:w-60 md:w-full p-4 mb-5 text-center">
            <h2 class="font-[600] text-[17px] text-[#65676B] dark:text-[#B0B3B8] mb-2">Suggested for you</h2>
            @auth
            <ul>
                @foreach ($users as $user)
                <li class="mb-2 flex justify-between items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#E4E6E9] dark:hover:bg-[#303031] group ">
                    <div class="flex self-start justify-self-start w-40">
                        @if (!empty($user->avatar))
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="User" class="w-8 h-8 rounded-full mr-2">
                        @else
                        <img src="https://via.placeholder.com/50" alt="User" class="w-8 h-8 rounded-full mr-2">
                        @endif
                        <a style="cursor: pointer;" href="http://127.0.0.1:8000/chatify/{{$user->id}}">
                            <div class="overflow-hidden overflow-ellipsis w-[125px]"><span class="dark:text-white truncate">{{
                $user->name }}</span></div>
                    </div></a>
                    <div class="relative inline-block text-left">

                        <button id="dropdown" data-dropdown-toggle="user-{{$user->name . '-' . $user->id}}" class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900" type="button"><svg fill="#000000" class="dark:fill-white" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="user-{{$user->name . '-' . $user->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown">
                                @auth
                                <li>

                                    <form action="{{ route('sendRequest', ['friend' => $user->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="block flex gap-1 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00b1ff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg> Befriend
                                        </button>
                                    </form>
                                </li>
                                @endauth
                                <li>
                                    <a href="#" class="block flex gap-1 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                        </svg>Block</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach
                @endauth
                @guest
                <li class="text-center list-none font-medium mt-[21px]">
                    <span class="text-dark dark:text-white">Log in to use this feature!</span>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    @endif
>>>>>>> 1c6d3528dce204dca9665309fcb829d7e59f8e72
</div>
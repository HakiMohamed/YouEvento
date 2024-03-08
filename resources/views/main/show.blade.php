<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-blue-30 bg-[#F0F2F5] dark:bg-[#18191A]" style="height: 100vh;">
    {{-- nav.blade.php --}}

<nav
class="bg-white dark:bg-[#242526] fixed w-full  z-20 h-[60px] top-0 start-0 border-b border-gray-200 dark:border-gray-600">
<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto h-full">
    <a href="/home" class="flex mx-3 items-center space-x-3 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
            stroke="#006EFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
        </svg>
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">YouEvento</span>
    </a>
    <div class="flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        @guest
        <a href="{{route('register')}}">
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                started</button>
        </a>
        @endguest
        @auth
        <form action="{{route('logout') }}" method="post" class="flex items-center mb-0">
            @csrf
            @method('post')
            <button type="submit"
                class="text-white bg-red-500 hover:text-white hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mx-3 px-2 py-2 text-center dark:hover:bg-red-700 dark:focus:ring-red-800"><i class="fa-solid fa-right-from-bracket"></i></button>
        </form>
        @endauth
        <button data-collapse-toggle="navbar-sticky" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
    </div>
    <div class="items-center  justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul
            class="flex flex-col items-center p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-[#242526] md:dark:bg-[#242526] dark:border-gray-700">
            <li>
                <a href="{{ route('events.index') }}"
                    class="block cursor-pointer py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" "
                    >Home</a>
            </li>
            <li>
                <a href="{{ route('events.create') }}"
                    class="block cursor-pointer py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700""
                    >create</a>
            </li>
            @auth
            <li>
                <a id="explorerTab" data-modal-target="explorer" data-modal-toggle="explorer"
                    class="block cursor-pointer py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Explore</a>
            </li>
            
            @endauth
           
            <li>
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 focus:outline-none hover:bg-transparent rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            
        </ul>
    </div>
</div>

<a href="/events" id="toggle-left-sidebar" class="fixed left-0 top-15 p-5 text-gray-700 hidden dark:text-white z-60">
    <i class="fa-solid fa-left-long"></i></a>
    
    </nav>
    @if (session('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    <div class="container-xl dark:text-white dark:bg-[#242526] h-full">
        <div class="mt-[120px] pb-[80px] lg:pb-[0px] lg:mt-16 flex flex-col md:flex-row">
            <div class="flex-1 mb-8 md:mb-0">
                <div class="rounded  bg-white dark:bg-[#242526] p-6">
                    <h2 class="text-black dark:text-white  font-semibold mb-4">{{ $event->title }}</h2>
                    <div class="flex items-center mb-4">
                        <i class="far fa-calendar-alt text-gray-500 mr-2"></i>
                        <p class="text-black dark:text-white ">{{ $event->date }}</p>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-location-dot text-gray-500 mr-2"></i> {{ $event->location }}

                        <p class="text-black dark:text-white ">{{ $event->location }}</p>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-ticket text-gray-500 mr-2"></i>
                        <p class="text-black dark:text-white ">Available Seats: {{ $event->available_seats }}</p>
                    </div>
                    @if($event->image)
                    <img src="{{ asset($event->image) }}" alt="Event Image" class="mb-6 rounded-lg" style="width: 250px; height: 200px;">
                    @else
                    <img src="{{ asset('images/events/defimage.webp') }}" alt="Default Event Image" class="mb-6 rounded-lg" style="width: 250px; height: 200px;">
                    @endif
                    
                </div>
                
            </div>
            <div class="flex-1">
                <div class="relative rounded  bg-white dark:bg-[#242526] p-6">
                    <div class="absolute top-2 right-0 mt-2 mr-4 mt-5 bg-green-800 text-white text-xs font-semibold px-2 py-1 rounded">
                        Categoriy :  {{ $event->category->name }}
                      </div>
                    <h2 class="text-2xl font-semibold mb-4">Description</h2>
                    <p class="text-black dark:text-gray-300">{{ $event->description }}</p>
                </div>
            </div>
            <div class="flex-1">
                <div class="mt-4 h-full">
                    <form action="{{ route('reservations.store', $event->id) }}" method="POST" class="max-w-md mx-auto">
                        @csrf
                        <div class=" rounded  bg-white dark:bg-[#242526] p-6">
                            <label for="ticket_type" class="block text-sm font-medium text-gray-700 dark:text-white"><i class="fa-solid fa-layer-group"></i> Ticket Type</label>
                            <select id="ticket_type" name="ticket_type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-[#242526] dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                </div>
            </div>
        </div>
    </div>

    <div id="explorer" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <div class="container">
                        <label for="searchBar" class="ms-1 mb-2 text-[15px] dark:text-white">Search For
                            Something</label>
                        <input type="search" id="searchBar" placeholder="Search for something.."
                            class="w-full rounded-full">
                    </div>
                </div>
                <!-- Modal body -->
                <div id="user-container" class="p-4 h-[250px] overflow-y-auto md:p-5 space-y-4"></div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    @vite('resources/js/imagePreview.js')
    @vite('resources/js/search.js')
    @vite('resources/js/comment.js')
    @vite('resources/js/ThemeChange.js')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>

@extends('layouts.app')

@section('content')
<div class="mt-16 container-xl dark:text-white">
    <div class="space-y-1">
        <!-- Evénement 1 -->

        
    <div class="max-w-4xl lg:w-[700px] mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-[#242526] overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-[#242526] border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold mb-4">Create Event</h2>
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block dark:text-gray-800 w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-textarea dark:text-gray-800 mt-1 block w-full rounded-md shadow-sm" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                        <input type="datetime-local" name="date" id="date" class="form-input dark:text-gray-800 rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                        <input type="text" name="location" id="location" class="form-input dark:text-gray-800 rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                        <select name="category_id" id="category_id" class="form-select dark:bg:white p-3 dark:text-gray-800 rounded-md shadow-sm mt-1 block w-full" required>
                            <option hidden value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="available_seats" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Available Seats</label>
                        <input type="number" name="available_seats" id="available_seats" class="form-input dark:text-gray-800 rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                        <input type="file" name="image" id="image" class="form-input dark:text-white rounded-md shadow-sm mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="acceptation" class="block text-sm font-medium text-gray-700 dark:text-white">Acceptance</label>
                        <input type="checkbox" name="acceptation" id="acceptation" value="1" class="form-checkbox dark:text-gray-800 mt-1 block">
                        <span class="text-sm text-gray-900 dark:text-yellow-400"><i class="fa-solid fa-triangle-exclamation" style="color: #FFD43B;"></i> Check this box if you want all reservations for this event to be automatic</span>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection

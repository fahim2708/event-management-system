@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-xl">
            <h1 class="text-2xl text-blue-950 font-bold mb-4 text-center">Add Event</h1>

            <form action="{{ route('event.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input id="title" name="title" rows="4"
                        class="w-full px-4 py-2 border rounded-md @error('title')
            border-red-500
        @enderror">
                    @error('title')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date" id="date" name="date"
                            class="w-full px-4 py-2 border rounded-md @error('date')
            border-red-500
        @enderror">
                        @error('date')
                            <div class="text-red-500 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input id="location" name="location"
                            class="w-full px-4 py-2 border rounded-md @error('location')
            border-red-500
        @enderror">

                        @error('location')
                            <div class="text-red-500 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Save</button>
                    </div>
            </form>
        </div>
    </div>
@endsection

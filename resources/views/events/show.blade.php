@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto my-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center">
        <h1 class="text-center font-bold mb-6 text-2xl text-blue-900">Event Details</h1>
        <div class="w-full overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <tbody>
                    <tr>
                        <th class="px-4 py-2 text-left border border-gray-300">ID:</th>
                        <td class="px-4 py-2 border border-gray-300">{{$event->id}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left border border-gray-300">Title:</th>
                        <td class="px-4 py-2 border border-gray-300">{{$event->title}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left border border-gray-300">Date:</th>
                        <td class="px-4 py-2 border border-gray-300">{{$event->date}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left border border-gray-300">Location:</th>
                        <td class="px-4 py-2 border border-gray-300">{{$event->location}}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left border border-gray-300">Description:</th>
                        <td class="px-4 py-2 border border-gray-300">{{$event->description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-6 w-full">
            <a href="{{ URL::to('events') }}"
                class="inline-flex items-center text-white font-bold px-4 py-2 rounded-md bg-blue-900 hover:bg-blue-800 transition duration-300"
                title="Back to previous page">
                <i class="fa-solid fa-backward mr-2"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection

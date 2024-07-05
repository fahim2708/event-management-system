@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">

        <h1 class="text-center font-bold mb-4 text-2xl text-blue-950">Event Management</h1>

        <form class="text-right mb-4">
            <input type="search" class="w-full md:w-48 px-4 py-2 border rounded-md" placeholder="Search Event..."
                name="search" value="{{ request('search') }}">
        </form>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-300 text-center">
                <thead class="bg-gray-700 text-white text-base">
                    <tr>
                        <th class="px-2 md:px-4 py-2 border border-gray-300">Event ID</th>
                        <th class="px-2 md:px-4 py-2 border border-gray-300">Title</th>
                        <th class="px-2 md:px-4 py-2 border border-gray-300">Description</th>
                        <th class="px-2 md:px-4 py-2 border border-gray-300">Date</th>
                        <th class="px-2 md:px-4 py-2 border border-gray-300">Location</th>
                        <th class="px-2 md:px-4 py-2 border border-gray-300">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 bg-white text-sm">
                    @if (count($events) > 0)
                        @foreach ($events as $event)
                            <tr>
                                <td class="border px-2 md:px-4 py-2 border-gray-300">{{ $event->id }}</td>
                                <td class="border px-2 md:px-4 py-2 border-gray-300">{{ $event->title }}</td>
                                <td class="border px-2 md:px-4 py-2 border-gray-300">{{ $event->description }}</td>
                                <td class="border px-2 md:px-4 py-2 border-gray-300">{{ $event->date }}</td>
                                <td class="border px-2 md:px-4 py-2 border-gray-300">{{ $event->location }}</td>

                                <td class="border px-2 md:px-4 py-2 border-gray-300">
                                    <div class="mt-4 flex">  
                                        <form action="{{ route('event.edit', ['id' => $event->id]) }}" method="GET">
                                            <button type="submit" title="Edit Event" class="px-2 py-2 hover:bg-green-100 rounded">
                                                <i class="fa-solid fa-pen-to-square" style="color: #089168;"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('event.show', ['id' => $event->id]) }}" method="GET">
                                            <button type="submit" title="Event Details" class="px-2 py-2 hover:bg-blue-100 rounded">
                                                <i class="fa-solid fa-circle-info" style="color: #0a67ae;"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('event.delete', ['id' => $event->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="event_id" id="event_id"
                                                value="{{ $event->id }}">
                                            <button title="Delete Event" class="px-2 py-2 hover:bg-red-100 rounded mr-4">
                                                <i class="fa-solid fa-trash" style="color: #e60f0f;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="border px-2 md:px-4 py-2 border-gray-300 text-red-500">No data Found
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $events->links() }}
        </div>
    </div>

    @if (session('success'))
        <div id="success-message" class="fixed bottom-0 right-0 mb-4 mr-4 bg-green-600 text-white p-1 rounded">
            <span class="text-sm">{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('success-message').style.display = 'none';
            }, 3000);
        </script>
    @endif
@endsection

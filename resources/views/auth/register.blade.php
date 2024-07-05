@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            <div class="mb-4 text-center text-2xl font-extrabold text-gray-600">
                <span>Register</span>
            </div>
            <form action="{{route ('register')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Full Name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')
                            border-red-500
                        @enderror">
                        @error('name')
                            <div class="text-red-500 text-xs">
                                {{$message}}
                            </div>
                        @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" id="email" placeholder="Email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                        border-red-500
                    @enderror">
                        @error('email')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                        border-red-500
                    @enderror">
                        @error('password')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                        @error('password_confirmation')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <button class="bg-sky-600 text-white p-2 rounded-lg w-full" type="submit">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
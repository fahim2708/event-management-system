@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            <div class="mb-4 text-center text-2xl font-extrabold text-gray-600">
                <span>Login</span>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                        border-red-500
                    @enderror">
                    @error('email')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
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
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div>
                        <input type="checkbox" name="remember" id="remember" class="mt-2">
                        <label for="remember">Remember me?</label>
                    </div>
                </div>

                @session('status')
                    <div class="mb-2 text-center font-extralight text-red-500 text-xs">
                        {{ session('status') }}
                    </div>
                @endsession

                <div>
                    <button class="bg-sky-600 text-white p-2 rounded-lg w-full" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
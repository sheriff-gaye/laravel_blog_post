@extends('layouts.app')

@section('content')

<div class="mt-5 flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{route('storage')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Full Name"
                class="bg-gray-100 w-full p-4 rounded-lg @error('name') border-2 border-rose-600 @enderror " value="{{old('name')}}">

                @error('name')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Username"
                class="bg-gray-100 w-full p-4 rounded-lg @error('username') border-2 border-rose-600 @enderror" value="{{old('username')}}">

                @error('username')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="Email" placeholder="Email"
                class="bg-gray-100 w-full p-4 rounded-lg @error('email') border-2 border-rose-600 @enderror" value="{{old('email')}}">

                @error('email')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                class="bg-gray-100 w-full p-4 rounded-lg @error('password') border-2 border-rose-600 @enderror">

                @error('password')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>


            <div class="mb-4">
                <label for="name" class="sr-only">Confirm Passowrd</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                class="bg-gray-100 w-full p-4 rounded-lg  @error('password_confirmation') border-2 border-rose-600 @enderror">

                @error('password_confirmation')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 px-4 py-3 text-white rounded w-full font-medium">Register</button>
            </div>
        </form>
    </div>

</div>



@endsection

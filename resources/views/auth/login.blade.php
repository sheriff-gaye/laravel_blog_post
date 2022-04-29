@extends('layouts.app')

@section('content')



<div class="mt-7 flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">

    @if (session('status'))
      <div class="text-white p-4 rounded-lg bg-red-500 mb-6 text-center">
           {{session('status')}}
      </div>
    @endif
    <h1 class="flex justify-center font-medium text-3xl">LOGIN</h1>
    <br>

        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only" >Email</label>
                <input type="email" name="email" id="email" placeholder="Email"
                class="bg-gray-100 p-4 rounded-lg w-full  @error('email') border-2 border-rose-600 @enderror">

                @error('email')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                class="bg-gray-100 p-4 rounded-lg w-full @error('password') border-2 border-rose-600 @enderror">

                @error('password')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember Me</label>

                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 px-4 py-3 text-white rounded w-full font-medium">Login</button>
            </div>
        </form>
    </div>

</div>



@endsection

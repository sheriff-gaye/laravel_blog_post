@extends('layouts.app')

@section('content')


<div class="mt-5 flex justify-center">

    <div class="w-8/12 bg-white p-6 rounded-lg text-center">
        @if (session('status'))
       <div class="text-white p-4 rounded-lg bg-green-500 mb-6 text-center">
             {{session('status')}}
        </div>
        @endif

        Dashboard
    </div>

</div>



@endsection

@extends('layouts.app')

@section('content')

<div class="mt-5 flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <h1 class="text-center text-2xl">UPDATE POST</h1>

        <form action="{{ route('update',[$post->id])}}" method="POST" class="mb-4">
            @csrf
            @method('PUT')
            <div class="m-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 p-4 w-full rounded-lg border-2 @error('body')border-2 border-rose-600
                @enderror" placeholder="Post Something!">{{$post->body}}</textarea>

                @error('body')
                <div class="text-red-500  text-sm mt-3">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 px-4 py-3 text-white rounded  font-medium ">Post</button>
            </div>
        </form>
    </div>
</div>

@endsection

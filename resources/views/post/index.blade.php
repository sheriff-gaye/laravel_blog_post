@extends('layouts.app')

@section('content')

<div class="mt-5 flex justify-center">

    <div class="w-6/12 bg-white p-6 rounded-lg">
        @if (session('message'))
        <div class="text-white p-4 rounded-lg bg-cyan-700 mb-6 text-center">
            {{session('message')}}
        </div>

        @endif
        <h1 class="flex justify-center text-2xl font-medium">LARAVEL BLOG</h1>

        <form action="{{route('poststore')}}" method="POST" class="mb-4">
            @csrf
            <div class="m-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 p-4 w-full rounded-lg border-2 @error('body')border-2 border-rose-600
                @enderror" placeholder="Post Something!"></textarea>

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

        @if ($posts->count())

        @foreach ($posts as $post )

        <div class="mb-4">

            <a href="{{route('user.post',$post->user)}}" class="font-bold text-black"> <i class="fa fa-user text-2xl" aria-hidden="true"></i>
                {{$post->user->name}}</a>  <span class="text-gray-600 text-sm">{{$post->created_at->diffForHUmans()}}</span>
                <br>

            <p class="mb-2">{{$post->body}}</p>

            <div class="flex items-center">
                @auth
                @if(!$post->likeBy(auth()->user()))
                <form action="{{route('post.like',[$post->id])}}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like</button>
                </form>
                @else
                <form action="{{route('post.delete',$post->id)}}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500"><i class="fa fa-thumbs-down" aria-hidden="true"> Unlike</i>
                    </button>
                </form>
                @endif

                @endauth

                <span> <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                    {{ $post->like->count()}} {{Str::plural('like',$post->like->count())}}</span>

                    @if ($post->ownBy(auth()->user()))
                    <form action="{{route('postdelete',$post->id)}}" method="POST" class="mr-1 ml-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 rounded p-1">Delete  <i class="fa fa-trash-o text-white" aria-hidden="true"></i>
                        </button>
                    </form>

                    {{-- <form action="" method="POST" class="mr-1 ml-3"> --}}
                        {{-- @csrf --}}
                        <a href="{{ route('postedit',$post->id)}}" class="text-white bg-green-700 p-1 rounded">Edit  <i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i></a>
                    {{-- </form> --}}
                    @endif
            </div>

        </div>
<hr>

        @endforeach

        {{$posts->links()}}


        @else
       <p> There is no post to display</p>
        @endif

    </div>

</div>



@endsection

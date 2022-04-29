@extends('layouts.app')

@section('content')
<div class="mt-5 flex justify-center">


    @if ($posts->count())

    <div class="w-6/12 bg-white p-6 rounded-lg mt-12">

        <h1 class="text-3xl mb-1 text-center  font-semibold uppercase">{{$user->name}}</h1>
        <p class="text-center"><i class="fa fa-bell text-yellow-500 text-2xl" aria-hidden="true"></i>
            Posted  {{ $posts->count()}} {{ Str::plural('post',$posts->count())}} post and recevied {{$user->receivedLikes->count()}} {{Str::plural('like',$user->receivedLikes->count())}}
            <i class="fa fa-heart  text-red-600 text-2xl" aria-hidden="true"></i>
              </p>
        <hr>
        <br>
        @foreach ($posts as $post )

        <div class="mb-4">

            <a href="{{route('user.post',$post->user)}}" class="font-bold">{{$post->user->name}}</a>  <span class="text-gray-600 text-sm">{{$post->created_at->diffForHUmans()}}</span>


            <p class="mb-2">{{$post->body}}</p>



            <div class="flex items-center">
                @auth
                @if(!$post->likeBy(auth()->user()))
                <form action="{{route('post.like',[$post->id])}}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like</button>
                </form> Like</button>
                </form>
                @else
                <form action="{{route('post.delete',$post->id)}}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Unlike</button>
                </form>  Unlike</button>
                </form>
                @endif

                @endauth

                <span> <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                    {{ $post->like->count()}} {{Str::plural('like',$post->like->count())}}</span>


            @if ($post->ownBy(auth()->user()))
                <form action="{{route('postdelete',$post->id)}}" method="POST" class="mr-1 ml-auto">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 rounded p-1 text-white">Delete  <i class="fa fa-trash-o text-white" aria-hidden="true"></i></button>
               </form>
               <a href="{{ route('postedit',$post->id)}}" class="text-white bg-green-700 p-1 rounded">Edit  <i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i></a>

            @endif
            </div>

        </div>
        <hr>

        @endforeach

        {{$posts->links()}}


        @else
        <p>  {{auth()->user()->name}} doesn't have any post</p>
        @endif

    </div>

</div>
</div>


@endsection

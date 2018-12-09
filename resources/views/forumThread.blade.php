@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$forum->name}}</div>

                    <div class="panel-body">

                        <br>Category : {{$forum->category->name}}
                        <br>Owner: {{$forum->user->name}}
                        <br>Posted at: {{$forum->created_at}}
                        <br>Description : {{$forum->description}}
                        <br>Status : {{$forum->status}}
                        <br><br>

                        <form action="forums" method="get">
                            {{csrf_field()}}
                            <input type="text" name="search" placeholder="Search"><br>
                            <input type="submit" value="Search">
                        </form>
                        <br>

                        {{--@if (Auth::check()) --}}{{--User are logged in!--}}
                        {{--<form action="forums/create" method="get">--}}
                            {{--<input type="submit" value="Add New Forum">--}}
                        {{--</form>--}}
                        {{--@endif--}}

                        <br>
                        @foreach($threads as $thread)
                        <div>
                            <a href="/profile/{{$thread->user_id}}">{{$thread->user->name}}</a><br>
                            Role : {{$thread->user->role}}<br>
                            Posted At : {{$thread->created_at}}<br>
                            {{$thread->content}}
                            @if(\Illuminate\Support\Facades\Auth::user()->id == $thread->user_id)
                                <form action="/threads/{{$thread->id}}/edit" method="get">
                                    {{csrf_field()}}
                                    <input type="submit" value="Edit">
                                </form>
                                <form action="/threads/{{$thread->id}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <input type="submit" value="Delete">
                                </form>
                            @endif

                            <br>
                            <br>
                        </div>
                        @endforeach

                        {{$threads->links()}}

                        @auth
                            @if($forum->status=="Open")
                                Post New Thread
                                <form action="/threads" method="post">
                                {{csrf_field()}}
                                    <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                Content<br>
                                    <textarea name="contents" id="contents" cols="80" rows="4"></textarea>
                                <br>
                                <input type="submit" value="Post">
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

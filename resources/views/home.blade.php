@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                        Search
                        <form action="/" method="get">
                            {{csrf_field()}}
                            Name <input type="text" name="search" placeholder="Name"><br>
                            <input type="submit" value="Search">
                        </form>
                        <br>

                        @if (Auth::check()) {{--User are logged in!--}}
                            <form action="forums/create" method="get">
                                <input type="submit" value="Add New Forum">
                            </form>
                        @endif

                        <br>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Posted At</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>

                            @foreach($forums as $forum)
                                <tr>
                                    <td>{{$forum->name}}</td>
                                    <td>{{$forum->category->name}}</td>
                                    <td>{{$forum->created_at}}</td>
                                    <td>{{$forum->description}}</td>
                                    <td>{{$forum->status}}</td>
                                    <td>
                                        <form action="/forums/{{$forum->id}}" method="get">
                                            <input type="submit" value="Detail">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {{$forums->links()}}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

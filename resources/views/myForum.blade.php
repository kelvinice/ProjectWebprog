@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($forums as $forum)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a>{{$forum->name}}</a>
                            <form action="/forums/{{$forum->id}}" method="post" style="float: right">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <input type="submit" value="Delete" >
                            </form>
                            <form action="/forums/{{$forum->id}}" method="post" style="float: right">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <input type="submit" value="Edit" >
                            </form>
                            <br>
                            Status : {{$forum->status}}
                        </div>

                        {{$forum->description}}
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

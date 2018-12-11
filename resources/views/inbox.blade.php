@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    @foreach($messages as $message)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="/profile/{{$message->sender}}">{{$message->Sender->name}}</a>
                            <form action="/messages/{{$message->id}}" method="post" style="float: right">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <input type="submit" value="Delete" >
                            </form>
                            <br>
                            {{$message->created_at}}
                        </div>

                        {{$message->content}}
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
@endsection

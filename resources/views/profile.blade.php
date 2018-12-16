@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                        @if(str_contains($user->profile,"lorempixel.com"))
                        <img src={{$user->profile}}>
                        @else
                        <img src={{ URL::to('/') }}/images/{{$user->profile}}>
                        @endif
                        Name : {{$user->email}} <br>
                        Popularity :
                        <span style="background-color: lime">+{{$plus}}</span>
                        <span style="background-color: red">-{{$minus}}</span>
                        <br>
                        Phone : {{$user->phone}} <br>
                        Birthday : {{$user->birthday}}<br>
                        Gender : {{$user->gender}}<br>
                        Address : {{$user->address}}<br>
                    @auth
                        @if( Auth::user()->id==$user->id)
                            <form action="/editProfile/{{$user->id}}" method="get">
                                {{csrf_field()}}
                                <input type="submit" value="Edit">
                            </form>
                        @else
                            @if($vote == "not")
                            <div>
                                Give Popularity
                                <form action="/popularities" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="target" value="{{$user->id}}">
                                    <input type="hidden" name="value" value="1">
                                    <input type="submit" value="plus">
                                </form>
                                <form action="/popularities" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="target" value="{{$user->id}}">
                                    <input type="hidden" name="value" value="-1">
                                    <input type="submit" value="minus">
                                </form>
                            </div>
                            @endif
                            <form action="/messages" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="receiver" value="{{$user->id}}">
                                Message :<br>
                                <textarea name="message" id="message" cols="100" rows="5"></textarea>
                                <br>
                                <input type="submit" value="Send">
                            </form>
                            <span class="help-block" style="color: red">
                                <strong>{{ $errors->first() }}</strong>
                            </span>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection

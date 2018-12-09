@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                        <img src={{ URL::to('/') }}/images/{{$user->profile}}>
                        Name : {{$user->email}} <br>
                        Popularity : <br>
                        Phone : {{$user->phone}} <br>
                        Birthday : {{$user->birthday}}<br>
                        Gender : {{$user->gender}}<br>
                        Address : {{$user->address}}<br>

                    @auth

                        @if(Auth::user()->id==$user->id)
                            <form action="/editProfile/{{$user->id}}" method="get">
                                {{csrf_field()}}
                                <input type="submit" value="Edit">
                            </form>
                        @else
                            <form action="">
                                Message :<br>
                                <textarea name="message" id="message" cols="100" rows="5"></textarea>
                                <br>
                                <input type="submit" value="Send">
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection

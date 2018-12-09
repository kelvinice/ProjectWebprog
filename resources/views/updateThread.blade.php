@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Thread Content</div>
                    <div class="panel-body">
                        <form action="/threads/{{$thread->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            Content<br>
                            <textarea name="contents" id="contents" cols="80" rows="4"></textarea><br>
                            <input type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

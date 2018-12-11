@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Category Page</div>

                    <div class="panel-body">
                        Update Category Id : {{$category->id}}
                        <form action="/categories/{{$category->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            Name <input type="text" name="name" placeholder="Name" value="{{$category->name}}"><br>
                            <input type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
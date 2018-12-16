@include('layouts.app')
@section('content')
<html>
<head>
    <head>
        <title>Master User Page</title>
    </head>
    List of User
    <form action="users/create" method="get">
        <input type="submit" value="Add New User">
    </form>
</head>
<body>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"> Photo </th>
                <th scope="col"> Name </th>
                <th scope="col"> Role </th>
                <th scope="col"> Email </th>
                <th scope="col"> Phone </th>
                <th scope="col"> Address </th>
                <th scope="col"> Birthday </th>
                <th scope="col"> Gender </th>
                <th scope="col"> Action </th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>@if(str_contains($u->profile,"lorempixel.com"))
                        <img src={{$u->profile}}>
                    @else
                        <img style="width: 100px;height: 100px;" src={{ URL::to('/') }}/images/{{$u->profile}}>
                    @endif</td>
                <td>{{$u->name}}</td>
                <td>{{$u->role}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->phone}}</td>
                <td>{{$u->address}}</td>
                <td>{{$u->birthday}}</td>
                <td>{{$u->gender}}</td>
                <td>
                    <form action="/users/{{$u->id}}/edit" method="get" style="display: inline-block">
                        <button  type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
                    </form>
                    <form action="/users/{{$u->id}}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</body>
</html>
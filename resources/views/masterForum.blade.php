@include('layouts.app')
@section('content')
    <html>
    <head>
        <head>
            <title>Master Forum Page</title>
        </head>
    </head>
    <body>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"> Name </th>
            <th scope="col"> Category </th>
            <th scope="col"> Owner </th>
            <th scope="col"> Description </th>
            <th scope="col"> Status </th>
            <th scope="col"> Action </th>
        </tr>
        </thead>
        <tbody>
        @foreach($forums as $forum)
            <tr>
                <td>{{$forum->name}}</td>
                <td>{{$forum->category->name}}</td>
                <td>{{$forum->user->name}}</td>
                <td>{{$forum->description}}</td>
                <td>{{$forum->status}}</td>
                <td>
                    <form action="/forums/{{$forum->id}}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <button  type="submit" class="btn btn-danger" @if($forum->status=="Closed")disabled @endif><span class="glyphicon glyphicon-remove"></span>Close</button>
                    </form>
                    <form action="/forums/{{$forum->id}}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $forums->links() }}
    </body>
    </html>
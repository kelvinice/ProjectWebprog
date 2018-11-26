<html>
<head>

</head>
<body>
Search
<form action="forums" method="get">
    {{csrf_field()}}
    Name <input type="text" name="search" placeholder="Name"><br>
    <input type="submit" value="Search">
</form>
<br>
<form action="forums/create" method="get">
    <input type="submit" value="Add New Forum">
</form>
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

    {{--{{dd($forums)}}--}}
    @foreach($forums as $forum)
        <tr>
            {{--{{dd($forum)}}--}}
            <td>{{$forum->name}}</td>
            <td>{{$forum->category->name}}</td>
            <td>{{$forum->created_at}}</td>
            <td>{{$forum->description}}</td>
            <td>{{$forum->status}}</td>
            <td>
                <form action="forums/{{$forum->id}}" method="get">
                    {{csrf_field()}}
                    <input type="submit" value="Detail">
                </form>
            </td>
        </tr>
    @endforeach

</table>
{{$forums->links()}}

</body>
</html>
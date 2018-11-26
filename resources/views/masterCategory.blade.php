<html>
    <head>

    </head>
    <body>
        Add New Category
        <form action="categories" method="post">
            {{csrf_field()}}
            Name <input type="text" name="name" placeholder="Name"><br>
            <input type="submit" value="Add">
        </form>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <br>
        List Forum Category
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <form action="categories/{{$category->id}}/edit" method="get">
                            {{csrf_field()}}
                            <input type="submit" value="Edit">
                        </form>
                        <form action="categories/{{$category->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit" value="Delete">
                        </form>

                    </td>
                </tr>
            @endforeach

        </table>

    </body>
</html>
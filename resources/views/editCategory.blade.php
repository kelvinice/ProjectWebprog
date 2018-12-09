@include('')

<html>
    <head>
        <title>Edit Category Page</title>
    </head>
    Update Category
    <form action="/categories/{{$category->id}}" method="post">
        {{csrf_field()}}
        {{method_field('put')}}
        Name <input type="text" name="name" placeholder="Name" value="{{$category->name}}"><br>
        <input type="submit" value="Update">
    </form>
</html>
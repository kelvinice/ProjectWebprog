<html>
<head>

</head>
<body>
Add New Category
<form action="/forums" method="post">
    {{csrf_field()}}
    Name <input type="text" name="name" placeholder="Name"><br>
    Category
    <select name="category">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <br>
    Description <input type="text" name="description" placeholder="Description"><br>
    <input type="submit" value="Add">
</form>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
<br>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>{{ $post->created_at }}</p>

    <a href="{{ url('posts/' . $post->id . '/edit') }}">Edit</a>

    <form action="{{ url('posts/' . $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <form action="{{ url('posts/' . $post->id) }}" method="post">
        @csrf
        @method('POST')
        <input type="text" name="title" value="{{ $post->title }}">
        <textarea name="content">{{ $post->content }}</textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

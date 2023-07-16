<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <form action="{{ url('posts') }}" method="get">
        <input type="text" name="search" value="{{ request('search') }}">
        <button type="submit">Search</button>
        
    </form>
    <button onclick="location.href='{{ url('posts') }}/create';">Create</button>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ url('posts') }}/{{ $post->id }}"><h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p></a>
            </li>
        @endforeach
    </ul>

    {{ $posts->withQueryString()->links() }}
</body>
</html>

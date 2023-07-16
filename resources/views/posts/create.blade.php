<!DOCTYPE html>
<html>
<body>

<h2>게시글 작성</h2>

<form action="/posts/store" method="POST">
  @csrf
  <label for="title">제목:</label><br>
  <input type="text" id="title" name="title" value=""><br>
  <label for="content">내용:</label><br>
  <textarea id="content" name="content"></textarea><br>
  <input type="submit" value="제출">
</form> 

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</body>
</html>

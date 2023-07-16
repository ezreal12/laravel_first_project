<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return back()->with('message', '게시글이 성공적으로 생성되었습니다!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 상세조회
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id); // 수정
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return redirect('posts/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('posts');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

//        $previewImage = $data['preview_image'];
//        $mainImage = $data['main_image'];
//        $previewImagePath = Storage::put('/images', $previewImage);
//        $mainImagePath = Storage::put('/images', $mainImage);
//        dd($previewImagePath, $mainImagePath);

        $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        $data['main_image'] = Storage::put('/images', $data['main_image']);

        Post::firstOrCreate($data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}

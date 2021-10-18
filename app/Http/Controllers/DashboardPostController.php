<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where('user_id', auth()->user()->id)->get();
        // dd($post);
        return view('dashboard.posts.index', ['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.posts.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required|unique:posts,slug',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($validatedData['title'])->slug('-');
        // dd(Post::pluck('slug')->toArray());
        if(in_array($validatedData['slug'], Post::pluck('slug')->toArray())){
            return redirect('dashboard/posts/create')->with('error', 'Judul post sudah ada');
        }
        if($request->file('image')){
            
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 100, '. . .');

        Post::create($validatedData);
        return redirect('dashboard/posts')->with('success', 'Post berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', ['post' => $post, 'category' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required|unique:posts,slug',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($validatedData['title'])->slug('-');
        // dd(Post::pluck('slug')->toArray());
        if($validatedData['slug'] != $post->slug){
            if(in_array($validatedData['slug'], Post::pluck('slug')->toArray())){
                return redirect('dashboard/posts/create')->with('error', 'Judul post sudah ada');
            }
        }
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 100, '. . .');

        Post::where('id', $post->id)->update($validatedData);
        return redirect('dashboard/posts')->with('success', 'Post berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('dashboard/posts')->with('success', 'Post berhasil dihapus');
    }

    // public function checkSlug(Request $request){
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
    //     return response()->json([
    //         'slug' => $slug
    //     ]);
    // }
}

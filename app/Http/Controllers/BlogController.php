<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\PostComment;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Post $post){
        $data['data'] = $post->latest()->take(6)->get(); 
        $data['rnd_post'] = Post::all()->random(3);
        $data['popular_post'] = Post::get()->sortByDesc('view_count')->take(4);
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return view('blog', $data);
    }

    public function show($slug){
        $data['post'] = Post::where('slug', $slug)->get()->first();
        $data['popular_post'] = Post::get()->sortByDesc('view_count')->take(4);
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return view('blog-post', $data);
    }

    public function posts_list(){
        $data['posts'] = Post::latest()->paginate(8);
        $data['popular_post'] = Post::get()->sortByDesc('view_count')->take(4);
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return view('posts_list', $data);
    }

    public function categories(category $category){
        $data['posts'] = $category->posts()->paginate(6);
        $data['popular_post'] = Post::get()->sortByDesc('view_count')->take(4);
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return view('posts_list', $data);
        
    }

    public function tags(tag $tag){
        $data['posts'] = $tag->posts()->paginate(6);

        $data['popular_post'] = Post::get()->sortByDesc('view_count')->take(4);
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return view('posts_list', $data);
        
    }

    public function search(Request $request){
        $data['posts'] = Post::where('title', $request->keyword)->orWhere('title', 'like', '%'.$request->keyword.'%')->paginate(6);
        $data['popular_post'] = Post::get()->sortByDesc('view_count')->take(4);
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return view('posts_list', $data);
        
    }

    public function store_post_comment(Request $request){
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        PostComment::create([
            'name' => $request->name,
            'message' => $request->message,
            'email' => $request->email
        ]);
        
        return redirect()->back()->with('message', 'Komentar Berhasil Dikirim .');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repository\PostRepository;
use App\Post;
use App\Calendar;
use App\Category;
use App\Tag;
use Faker\Provider\Lorem;
use Auth;

class PostController extends Controller
{
    protected $user;


    function __construct()
    {
        $this->user = new PostRepository;
    }
    

    public function index()
    {
        $data['post'] = $this->user->getPost(10);
        return view('admin.post.index', $data);
    }

     
    public function create()
    {   
        return view('admin.post.create', $this->user->createPost());
    }

    
    public function store(PostRequest $request)
    {
        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        
        $post  = Post::create([
            'title'         => $request->title,
            'category_id'   => $request->category_id,
            'content'       => $request->content,
            'slug'          => Str::slug($request->title),
            'image'         => 'public/uploads/posts/' . $new_image,
            'user_id'       => Auth::id()
        ]);
        $post->tags()->attach($request->tags);
        
        $image->move('public/uploads/posts/', $new_image);
        return redirect()->route('post.index')->with('message', 'Post Berhasil Ditambahkan.');
    }

     
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
        $category = Category::all();
        $tag = Tag::all();
        $post = Post::findorfail($id);
        return view('admin.post.edit', compact('category', 'tag', 'post'));
    }

     
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findorfail($id);

        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/posts/', $new_image);
            $post_data  = [
                'title'         => $request->title,
                'category_id'   => $request->category_id,
                'content'       => $request->content,
                'slug'          => Str::slug($request->title),
                'image'         => 'public/uploads/posts/' . $new_image
            ];
        }else{
            $post_data  = [
                'title'         => $request->title,
                'category_id'   => $request->category_id,
                'content'       => $request->content,
                'slug'          => Str::slug($request->title)
            ];
        }

        
        $post->tags()->sync($request->tags);
        $post->update($post_data);
        
        return redirect()->route('post.index')->with('message', 'Post Berhasil Diubah.');
    }

     
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Data Post Berhasil Dihapus (Silahkan Cek Trashed Post)');
    }

    public function trashed(){
        $post = Post::onlyTrashed()->paginate(10);
        return view('admin.post.trashed', compact('post'));
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('post.trashed')->with('message', 'Data Post Berhasil Direstore (Silahkan Cek List Post)');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->route('post.trashed')->with('message', 'Data Post Berhasil Dihapus secara permanen');
    }


    public function calendar(){
        return view('admin.calendar.index');
    }

    public function event(){
        $event = Calendar::all();
        return response()->json($event, 200);
    }
}

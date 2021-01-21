<?php 
namespace App\Repository;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\View;

class PostRepository
{

    function getPost($n){
        $post = Post::latest()->paginate($n);
        return $post;
    }

    function createPost(){
        $data['category'] = Category::all();
        $data['tag'] = Tag::all();
        return $data;
    }

    function insertPost(){
    }
    
    function updatePost($id){
        
    }

    function deletePost($id){
       
    }
}
<?php 
namespace App\Repository;

use App\Tag;
use Illuminate\Support\Str;

class TagRepository
{
    function insertTag(){
        Tag::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);
    }
    
    function updateTag($id){
        $tag_data = [
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
        ];

        Tag::whereId($id)->update($tag_data);
    }

    function deleteTag($id){
        $tag = Tag::findorfail($id);
        $tag->delete();
    }
}
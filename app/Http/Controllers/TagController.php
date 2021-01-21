<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repository\TagRepository;
use App\Tag;

class TagController extends Controller
{
    
    protected $tag;

    function __construct() {
        $this->tag = new TagRepository();
    }

    public function index()
    {
        $tag = Tag::latest()->paginate(5);
        return view('admin.tag.index', compact('tag'));
    }

    
    public function create()
    {
       // return view('admin.tag.create');
    }

    
    public function store(TagRequest $request)
    {
        $this->tag->insertTag();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $tag = Tag::findorfail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    
    public function update(TagRequest $request, $id)
    {
        $this->tag->updateTag($id);
       
    }

    
    public function destroy($id)
    {
        $this->tag->deleteTag($id);
    }
}

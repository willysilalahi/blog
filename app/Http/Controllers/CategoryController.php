<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
     
    public function index()
    {
        $category = Category::paginate(5);
        return view('admin.category.index', compact('category'));
    }

     
    public function create()
    {
        return view('admin.category.create');
    }

     
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:30'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Ditambahkan.');
    }

     
    public function show($id)
    {
        return "Ini akan mencetak data dengan id = $id";
    }

    
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|min:5|max:30'
        ]);
        $category_data = [
            'name'  => $request->name,
            'slug'  => Str::slug($request->name)
        ];

        Category::whereId($id)->update($category_data);
        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Diedit');
    }

     
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Dihapus');
    }
}

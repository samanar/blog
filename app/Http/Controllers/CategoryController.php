<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $rules = [
        'name' => 'required|max:255'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index')->withCategories($categories);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $category = new Category;
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.list');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        foreach ($category->posts as $post) {
            $post->category_id = null;
            $post->save();
        }
        $category->delete();
        return redirect()->route('categories.list');
    }
}

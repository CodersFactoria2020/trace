<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view-any', Category::class);
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        Category::create($request->all());
        return redirect('/areas')->with('status_success',"S'ha creat la categoria correctament");
    }

    public function show(Category $category)
    {
        $this->authorize('view', Category::class);
        return view('category.show', compact('categories'));
    }

    public function edit(Category $category)
    {
        $this->authorize('update', Category::class);
        $categories = Category::all();
        return view('category.edit', compact('categories'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', Category::class);
        $category->update($request->all());
        return redirect('/areas')->with('status_success',"S'ha actualitzat la categoria correctament");
    }

    public function destroy(Category $category)
    {
        $this->authorize('destroy', Category::class);
        $category->delete();
        return redirect('/areas')->with('status_success',"S'ha suprimit la categoria correctament");
    }
}


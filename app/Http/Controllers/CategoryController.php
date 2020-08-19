<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->role_id != "Admin") {
                return view('user.notauthorized');
        }
        return view('category.index', compact('categories'), compact('users'), compact('roles'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->role_id != "Admin") {
                return view('user.notauthorized');
        }
        return view('category.create', compact('categories'), compact('users'), compact('roles'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect('/areas')->with('status_success',"S'ha creat la categoria correctament");
    }

    public function show(Category $category)
    {
        $roles = Role::all();
        return view('category.show', compact('categories'), compact('users'), compact('roles'));
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->can('edit', $user)) {
            return view('category.edit', compact('users'), compact('roles'));
        }
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect('/areas')->with('status_success',"S'ha actualitzat la categoria correctament");
    }

    public function destroy(Category $category)
    {
        if (auth()->user()->can('destroy', $category)) {
            $category->delete();
        }
        return redirect('/areas')->with('status_success',"S'ha suprimit la categoria correctament");
    }
}


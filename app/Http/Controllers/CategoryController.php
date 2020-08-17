<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Activity;
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
        $activities = Activity::all();
        if (auth()->user()->role_id != "Admin") {
                return view('user.notauthorized');
        }
        return view('category.index', ['categories' => $categories], compact('users'), compact('roles'), compact('activities'));
    }
    
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        if (auth()->user()->role_id != "Admin") {
                return view('user.notauthorized');
        }
        return view('category.create', ['categories' => $categories], compact('users'), compact('roles'), compact('activities'));
    }

    public function store(Request $request)
    {
        Activity::create($request->all());
        return redirect('/category');
    }

    public function show(Category $category)
    {
        $roles = Role::all();
        return view('category.show', ['categories' => $categories], compact('users'), compact('roles'), compact('activities'));
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        if (auth()->user()->can('edit', $user)) {
            return view('category.edit', ['users' => $users], compact('activities'), compact('roles'));
        }
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect('/category');
    }

    public function destroy(Category $category)
    {
        if (auth()->user()->can('destroy', $category)) {
            $category->delete();
        }
        return redirect('/category');
    }
}
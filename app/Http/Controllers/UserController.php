<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
       $validated= $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create($validated);
        Auth::attempt($request->only('email', 'password'));
        return redirect('/');  
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($validated)) {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function profile()
    {
        $posts = Auth::user()->posts->sortByDesc('created_at');
        return view('auth.profile' , compact('posts'));
    }

    public function edit()
    {
        return view('auth.edit');
    }

    public function update(Request $request)
    {
       $validated= $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'name' => 'required|max:255',
            'email' => 'required|email',
            'username' => 'required|max:20',
            'phone' => 'required|numeric',
            'bio' => 'nullable|max:255',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $validated['image'] = "/images/$name";
        }
        Auth::user()->update($validated);
        return redirect('/profile');    
    }
  
}

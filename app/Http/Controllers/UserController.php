<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.welcome',compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    public function update(request $request,$id){
        $this->checkValid($request);
        $data = request()->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        User::where('id',$id)->update($data);
        return redirect('/')->with('done',"Great..updated successfully");
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }

    public function add(){
        return view('user.add');
    }

    public function create(request $request){
        $this->checkValid($request);
        $data = request()->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('/')->with('added',"Great..added successfully");
    }





    ######################### Validation ##################
    public function checkValid(request $request){
        return $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255|min:8',
        ],[
            'name.required' => 'You must enter the name of the user',
            'name.max'      => 'Too long name!',
            'email.required'   => 'Enter an email',
            'password.required'   => 'Enter a password',
            'password.min'   => 'Too weak password !',
            'password.max'   => 'Too long password !',
        ]);
    }
}

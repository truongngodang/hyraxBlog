<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'birthday' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ));

        $user = new User();
        $user->name = $request['name'];
        $user->birthday = $request['birthday'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        $role = $request['role'];
        $user->roles()->attach(Role::where('name', $role)->first());

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return view('admin.pages.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.pages.users.edit', ['roles' => $roles, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'role' => 'required',
            'name' => 'max:255',
            'birthday' => 'date',
            'password' => 'min:6|confirmed',
        ));
        
        $user = User::find($id);
        
        if ($request['name'])
            $user->name = $request['name'];
        if ($request['birthday'])
            $user->birthday = $request['birthday'];
        if ($request['email'] && $request['email'] != $user->email)
        {
            $this->validate($request, array('email' => 'email|max:255|unique:users'));
            $user->email = $request['email'];
        }
        if ($request['password'])
            $user->password = Hash::make($request['password']);
        
        $user->save();
        
        if ($request['role'] != $user->getRole()->name){
            $user->roles()->detach();
            $role = $request['role'];
            $user->roles()->attach(Role::where('name', $role)->first());
        }
        
        return redirect()->route('admin.users.show',"$user->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}

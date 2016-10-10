<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Role;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name, $id)
    {
        $user = Auth::user();
        if (str_slug($user->name) != str_slug($name) || $user->id != $id)
            return redirect()->route('getIndex');
        return view('front.pages.member.index');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name, $id)
    {
        $user = Auth::user();
        $roles = Role::all();
        if (str_slug($user->name) != $name || $user->id != $id)
            return redirect()->route('getIndex');
        return view('front.pages.member.edit',['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name, $id)
    {
        $this->validate($request, array(
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

        $user->save();

        return redirect()->route('member.index',array($user->name, $user->id));
    }

    public function changePass($name, $id) {
        $user = Auth::user();
        if (str_slug($user->name) != str_slug($name) || $user->id != $id)
            return redirect()->route('getIndex');
        return view('front.pages.member.chpass',['user' => $user]);
    }

    public function updatePass(Request $request, $name, $id) {
        $this->validate($request, array(
            'oldpassword' => 'required|min:6',
            'password' => 'min:6|confirmed'
        ));

        $user = User::find($id);

        if (Hash::check($request['oldpassword'], $user->password)) {
            $user->password = Hash::make($request['password']);
        } else {
            return redirect()->back();
        }

        $user->save();

        return redirect()->route('member.index',array($user->name, $user->id));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Hash;
class AuthController extends Controller
{
    public function getRegister()
    {
        if (Auth::check())
            return redirect()->route('getIndex');
        return view('auth.register');
    }

    public function postRegister(Request $request)
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
        $user->roles()->attach(Role::where('name', 'User')->first());
        Auth::login($user);
        return redirect()->route('admin.getIndex');
    }

    public function getLogin()
    {
        if (Auth::check())
            return redirect()->route('getIndex');
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            if ($request->user()->getRole()->name == 'Admin'){
                return redirect()->route('admin.getIndex');
            }
            return redirect()->route('getIndex');
        }

        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getIndex');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
    function login()
    {
        if (Auth::check()) {
            return redirect()->route('trangChu');
        } else {
            return view('login.login');
        }
    }
    function loginProcessing(request $request)
    {
        $arr=[
            'email' => $request->name,
            'password' => $request->password
        ];
        if (Auth::attempt($arr)) {
            return redirect()->route('trangChu');
        } else {
            $kq='tài khoản, hoặc mật khẩu không tồn tại';
            return redirect()->route('login')->with($kq);
        }
    }
    public function index()
    {
      $user = User::all();
      return response()->json(['user'=>$user], 200);
    }

    public function show($id)
    {
      $user = User::find($id);
      return response()->json(['user'=>$user], 200);
    }
}

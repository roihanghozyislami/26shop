<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    public function loginpage(){
        return view('login');
    }

    public function registerpage(){
        return view('register');
    }

    public function dashboard(){
        return view('dashboard');
    }

     public function login(Request $request){
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('user')->where('nama', $request->nama)->first();

        if ($user) {
            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->level === "admin") {
                    // Simpan data user ke session
                    $request->session()->put('id_user', $user->id_user);
                    $request->session()->put('nama', $user->nama);
                    $request->session()->put('login_admin',TRUE);
                    return redirect('/dashboard');
                }else{
                    // Simpan data user ke session
                    $request->session()->put('id_user', $user->id_user);
                    $request->session()->put('nama', $user->nama);
                    $request->session()->put('login',TRUE);
                    return redirect('/dashboard-pembeli');
                }
                return redirect('/login-page')->with('gagal',"Password Salah...");
            }
        }else{
            return redirect('/login-page')->with('gagal',"Username Tidak Terdaftar...");
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/login-page')->with('logout','Kamu Sudah Logout...');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'     => 'required|unique:users,name',
            'password' => 'required|min:5',
        ]);

        DB::table('user')->insert([
            'nama'     => $request->nama,
            'password' => Hash::make($request->password),
            'level' => 'pembeli',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login-page')->with('berhasil', 'Berhasil Daftar...');
    }
}

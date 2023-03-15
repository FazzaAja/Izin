<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Piket;
use App\Models\Murid;
use App\Models\Izin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dash()
    {
        $murid = Murid::all();
        $piket = Piket::all();
        $izin = Izin::all();
        return view('piket.dashboard', [ 'listPiket' => $piket, 'listMurid' => $murid, 'listIzin' => $izin ]);
    }

    public function index()
    {   
        $murid = Murid::all();
        $piket = Piket::all();
        return view('auth.login', [ 'listPiket' => $piket, 'listMurid' => $murid ]); 
    }

    public function loginPiket(Request $request)
    {
        // $request->validate(['nama' => 'required', 'password' => 'required']);

        // // dd($request->validate(['nama' => 'required', 'password' => 'required']));
        // dd(Auth::guard('piket')->attempt(['nama' => $request->nama, 'password' => $request->password]));
        // if (Auth::guard('piket')->attempt(['nama' => $request->nama, 'password' => $request->password])) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('dash');
        // }

        // return back()->with('gagal', 'Login Gagal!');

        $piket = Piket::where('nama', '=', $request->nama)->first();
        
        if($piket && Hash::check($request->password, $piket->password))
        {
            Auth::guard('piket')->login($piket);
            return redirect()->intended('/dashboard');
        }

        return back()->with('gagal', 'Login Gagal!');
    }

    public function loginMurid(Request $request)
    {
        $nama = $request->input('nama');

        $murid = Murid::where('nama', $nama)->first();

        if ($murid && $murid->nisn == $request->nisn)
        {
            Auth::guard('murid')->login($murid);
            return redirect('/profile');
        };

        return back()->with('gagal', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

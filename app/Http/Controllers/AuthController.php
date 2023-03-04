<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Piket;
use App\Models\Murid;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dash()
    {
        $murid = Murid::all();
        $piket = Piket::all();
        $izin = Izin::all();
        return view('piket.dashboard', [ 'listPiket' => $piket, 'listMurid' => $murid, 'listIzin' => $izin ]);
    }

    public function profile()
    {
        $murid = Murid::all();
        $piket = Piket::all();
        $izin = Izin::all();
        return view('murid.profile', [ 'listPiket' => $piket, 'listMurid' => $murid, 'listIzin' => $izin ]);
    }

    public function index()
    {   
        $murid = Murid::all();
        $piket = Piket::all();
        return view('auth.login', [ 'listPiket' => $piket, 'listMurid' => $murid ]); 
    }

    public function loginPiket(Request $request)
    {
        $credentials = $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('piket')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        };

        return back()->with('gagal', 'Login Gagal!');
    }

    public function loginMurid(Request $request)
    {
        $nisn = $request->input('nisn');
        $nama = $request->input('nama');

        if (Auth::attempt(['nisn' => $nisn, 'nama' => $nama]))
        {
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

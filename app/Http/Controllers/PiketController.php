<?php

namespace App\Http\Controllers;

use App\Models\Piket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $piket = Piket::all();
        return view('piket.piket', [ 'listPiket' => $piket ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'nip' => 'required|digits_between:9,18|numeric',
            'password' => 'required|confirmed|min:6'
        ]);

        $data['password'] = bcrypt($data['password']);

        Piket::create($data);
        return redirect()->route('piket.index')->with('successAddPiket', 'Sukses Menambah Piket.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piket $piket)
    {
        $piket->delete();
       
        return redirect()->route('piket.index')
                        ->with('successDeletePiket','Sukses menghapus Piket');
    }
}

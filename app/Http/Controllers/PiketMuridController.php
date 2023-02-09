<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Jurusan;
use Illuminate\Contracts\Session\Session;
use App\Exports\MuridExport;
use App\Imports\MuridImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PiketMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = Murid::with('jurusan')->get();
        $jurusan = Jurusan::with('murid')->get();
        return view('piket.murid', ['listMurid' => $murid, 'listJurusan' => $jurusan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('piket.tambah-murid', ['listJurusan' => $jurusan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();



        $request->validate([
            'nisn' => 'digits:10|numeric|unique:murid,nisn',
            'nipd' => 'digits_between:9,15|numeric|unique:murid,nisn',
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:1024',
        ],[
            'nisn.digits' => 'NISN harus 10 digit', 
            'nisn.digits_between' => 'NIPD harus antara 9 sampai 15 digit', 
        ]);

        // dd($requestData);
        Murid::create($requestData);
        return redirect('/piket/murid')->with('success', 'Sukses Menambah Murid.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit(Murid $murid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murid $murid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murid $murid)
    {
        //
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new MuridExport, 'data-murid-SMKN4TSM.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new MuridImport,request()->file('file'));
               
        return back();
    }
}

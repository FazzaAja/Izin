<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Jurusan;
use Illuminate\Contracts\Session\Session;
use App\Exports\MuridExport;
use App\Imports\MuridImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\MuridFormRequest;

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
        return view('piket.murid-tambah', ['listJurusan' => $jurusan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuridFormRequest $request)
    {
        $data = $request->validated();
        Murid::create($data);
        return redirect()->route('murid.index')->with('successAdd', 'Sukses Menambah Murid.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        return view('piket.murid-detail',compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit(Murid $murid)
    {
        $jurusan = Jurusan::all();
        return view('piket.murid-ubah',['listJurusan' => $jurusan], compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(MuridFormRequest $request, Murid $murid)
    {
        $data = $request->validated();
        $murid->fill($data);
        $murid->save();
      
        return redirect()->route('murid.show',$murid->id)
                        ->with('successEdit','Sukses Mengubah Murid');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murid $murid)
    {
        $murid->delete();
       
        return redirect()->route('murid.index')
                        ->with('successDelete','Sukses menghapus murid');
    }

    public function deleteAll()
    {
        Murid::query()->delete();

        return redirect()->route('murid.index')->with('successDelete','Sukses menghapus murid');
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
               
        return redirect()->route('murid.index')->with('successImport','Sukses mengimport murid');
    }

}

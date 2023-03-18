<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\Murid;
use Illuminate\Http\Request;

class PiketIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $izin = Izin::with('murid', 'piket')->get();
        return view('piket.izin', ['listIzin' => $izin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $murid = Murid::all();
        return view('piket.izin-tambah', ['listMurid' => $murid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $piket = auth('piket')->id(); // mengambil id piket yang sudah login
        $izin = new Izin();
        $izin->murid_id = $request->murid_id;
        $izin->alasan = $request->alasan;
        $izin->status = $request->status;
        $izin->piket_id = $piket;
        $izin->save();

        // cek value dari button yang di-submit
        if ($request->has('submit')) {
            return redirect()->route('izin.index')->with('successAdd', 'Sukses Menambah Murid.');
        } elseif ($request->has('lanjut')) {
            return redirect()->route('izin.create')->with('successAdd', 'Sukses Menambah Murid.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function show(Izin $izin)
    {
        return view('piket.izin-detail',compact('izin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function edit(Izin $izin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Izin $izin)
    {
        $izin->update($request->all());
      
        return redirect()->route('izin.index')
                        ->with('successEdit','P');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izin $izin)
    {
        $izin->delete();
       
        return redirect()->route('izin.index')
                        ->with('successDelete','S');
    }
}

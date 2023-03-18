<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Izin;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $izin = Izin::with('murid', 'piket')->latest()->paginate(10);


        return view('home', ['listIzin' => $izin], compact('izin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Izin $izin)
    {
        return view('home-detail' ,compact('izin'));
    }

    public function profile()
    {
        $izin = Izin::where('murid_id', '=', auth('murid')->user()->id)->with('murid')->latest()->get();
        return view('murid.profile',['listIzin' => $izin]);
    }

    public function detail(Izin $izin)
    {
        return view('murid.detail' ,compact('izin'));
    }

    public function foto(Request $request, Izin $izin)
    {

        if ($request->input('keluar')){
            $imageData = base64_decode(str_replace('data:image/png;base64,', '', $request->input('keluar')));
            $newName = time() . '_' . rand(1000, 9999) . '.png';
            Storage::put('keluar/' . $newName, $imageData);
            $request['keluar'] = 'keluar/'.$newName;
            
            $izin->update($request->all());

            return redirect()->back();
        }

        if ($request->input('kembali')){
            $imageData2 = base64_decode(str_replace('data:image/png;base64,', '', $request->input('kembali')));
            $newName2 = time() . '_' . rand(1000, 9999) . '.png';
            Storage::put('kembali/' . $newName2, $imageData2);
            $request['kembali'] = 'kembali/'.$newName2;
            $izin->update(['status' => 'Proses']);
            
            $izin->uploaded_at = now();

            $izin->update($request->all());

            return redirect()->route('profile');
        }

    }
    
}

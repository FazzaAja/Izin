<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Izin;

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
        $requestData = $request->all();

        $request->validate([
            'keluar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kembali' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = '';

        if ($request->file('keluar')) {
            if ($izin->keluar) {
                unlink(public_path('/storage/' . $izin->keluar));
            }
            $extension = $request->file('keluar')->getClientOriginalExtension();
            $newName = now()->timestamp . '.' . $extension;
            $path = $request->file('keluar')->storeAs('keluar', $newName);
            $requestData['keluar'] = $path;
        } else {
            unset($requestData['keluar']);
        }

        if ($request->file('kembali')) {
            if ($izin->kembali) {
                unlink(public_path('/storage/' . $izin->kembali));
            }
            $extension = $request->file('kembali')->getClientOriginalExtension();
            $newName = now()->timestamp . '.' . $extension;
            $path = $request->file('kembali')->storeAs('kembali', $newName);
            $requestData['kembali'] = $path;
            $izin->update(['status' => 'Sudah Kembali']);
            $izin->save();
        } else {
            unset($requestData['kembali']);
        }

        $izin->uploaded_at = now();

        $izin->update($requestData);

        return redirect()->route('profile');
    }
}

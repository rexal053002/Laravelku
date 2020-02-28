<?php

namespace App\Http\Controllers;

use App\Wali;
use App\Mahasiswa;
use Illuminate\Http\Request;
class WaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wali = wali::with('mahasiswa')->get();
        return view('wali.index', compact('wali'));
    }

    public function create()
    {
        $mhs = Mahasiswa::all();
        return view('wali.create', compact('mhs'));
    }

    public function store($id)
    {
        $wali = new wali();
        $wali->nama = $request->nama;
        $wali->id_mhs = $request->id_mhs;
        $wali->save();
        return redirect()->route('wali.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $mhs = Mahasiswa::all();
        $wali = Wali::findOrFail($id);
        return view('wali.show', compact('wali','mhs'));
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::all();
        $wali = Wali::findOrFail($id);
        return view('wali.edit', compact('wali','mhs'));
    }

    public function update(Request $request,$id)
    {
        $wali = Wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->id_mhs = $request->id_mhs;
        $wali->save();
        return redirect()->route('wali.index')->with(['message'=>'Data berhasil dibuat']);

    }

    public function destroy(Wali $wali)
    {
        $mhs = Wali::findOrFail($id)->delete();
        return redirect()->route('wali.index')->with(['message'=>'Dosen berhasil di hapus']);
    }
}

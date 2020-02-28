<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Dosen;
class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $mhs = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', compact('mhs'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('mahasiswa.create', compact('dosen'));
    }

    public function store($id)
    {
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->id_dosen = $request->id_dosen;
        $mhs->save();
        return redirect()->route('mahasiswa.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $dosen = Dosen::all();
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mhs','dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::all();
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mhs','dosen'));
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->id_dosen = $request->id_dosen;
        $mhs->save();
        return redirect()->route('mahasiswa.index')->with(['message'=>'Data berhasil dibuat']);

    }

    public function destroy($id)
    {
        $dosen = Mahasiswa::findOrFail($id)->delete();
        return redirect()->route('mahasiswa.index')->with(['message'=>'Dosen berhasil di hapus']);
    }
}

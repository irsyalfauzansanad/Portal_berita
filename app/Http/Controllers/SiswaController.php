<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Session;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new siswa;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->save();
        return redirect()->route('siswa.index')->with(['message' => 'Data Berhasil Disimpanan']);;
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show',compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit',compact('siswa'));       
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->save();
        return redirect()->route('siswa.index')->with(['message' => 'Data Berhasil Disimpanan']);
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with(['message' => 'Data Berhasil Disimpanan']);
    }
}

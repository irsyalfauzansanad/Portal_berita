<?php

namespace App\Http\Controllers;

use App\Tabungan;
use App\Siswa;
use Illuminate\Http\Request;
use Session;
use DB;
class TabunganController extends Controller
{
    public function jumlah_tabungan()
    {
        $tabungan = Tabungan::with('siswa')
            ->select('siswa_id', \DB::raw('sum(tabungans.jumlah_uang) as jumlah_uang'))
            ->groupBy('siswa_id')
            ->get();
        // dd($tabungan);
        return view('tabungan.report', compact('tabungan'));
    }
    public function index()
    {
        $tabungan = Tabungan::with('siswa')->get();
        // $tabungan = DB::table('tabungans')
        //             ->select('siswas.id', \DB::raw('sum(jumlah_uang) as jumlah_uang'))
        //             ->get();
        return view('tabungan.index', compact('tabungan'));
    }

    public function create()
    {
        $data = Siswa::all();
        return view('tabungan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tabungan = new Tabungan;
        $tabungan->siswa_id = $request->siswa_id;
        $tabungan->jumlah_uang = $request->jumlah_uang;
        $tabungan->save();
        return redirect()->route('tabungan.index')->with(['message' => 'Data Berhasil Disimpanan']);; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $siswa = Siswa::all();
        return view('tabungan.show',compact('tabungan', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $siswa = Siswa::all();
        return view('tabungan.edit',compact('tabungan', 'siswa')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $siswa = Siswa::all();
        $tabungan->siswa->nama = $request->nama;
        $tabungan->jumlah_uang = $request->jumlah_uang;
        $tabungan->save();
        return redirect()->route('tabungan.index', compact('tabungan', 'siswa'))->with(['message' => 'Data Berhasil DiUpdate']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $tabungan->delete();
        return redirect()->route('tabungan.index')->with(['message' => 'Data Berhasil DiHapus']);
    }
}

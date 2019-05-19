<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $penyakits = Penyakit::all();
        return view('pages.penyakit.index', compact('penyakits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penyakit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_penyakit = $request->get('kode_penyakit');
        $nama_penyakit = $request->get('nama_penyakit');

        Penyakit::create([
          'kode_penyakit' => $kode_penyakit,
          'nama_penyakit' => $nama_penyakit,
        ]);

        return redirect()->back()->with(['status' => 'Data Sudah Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyakits = Penyakit::findOrFail($id);
        return view('pages.penyakit.edit', compact('penyakits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nama_penyakit = $request->get('nama_penyakit');
        Penyakit::where('id', $id)->update([
          'nama_penyakit' => $nama_penyakit,
        ]);
        return redirect()->back()->with(['status' => 'Data Sudah DiUpdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $profileteams = Penyakit::findOrFail($id);
      $profileteams->delete();
      return redirect()->route('penyakit.index')->with('status', 'Data Berhasil Dihapus');
    }
}

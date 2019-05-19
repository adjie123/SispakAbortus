<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $gejalas = Gejala::all();
        return view('pages.gejala.index', compact('gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.gejala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $kode_gejala = $request->get('kode_gejala');
      $nama_gejala =  $request->get('nama_gejala');

      Gejala::create([
        'kode_gejala' => $kode_gejala,
        'nama_gejala' => $nama_gejala,
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
        $gejalas = Gejala::find($id);
        return view('pages.gejala.edit', compact('gejalas'));
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
      $nama_gejala =  $request->get('nama_gejala');

      Gejala::where('id', $id)->update([
        'nama_gejala' => $nama_gejala,
      ]);

      return redirect()->back()->with(['status' => 'Data Berhasil DiUpdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profileteams = Gejala::findOrFail($id);
        $profileteams->delete();
        return redirect()->route('gejala.index')->with('status', 'Data Berhasil Dihapus');
    }
}

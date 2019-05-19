<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $gejalas = Gejala::all();
        return view('home', compact('gejalas'));
    }


    public function postG2(Request $request)
    {
      //Terjadi pendarahan pada vagina = g2
      $sg2 = $request->session()->put('sg2', $request->input('pilihan'));
      $G2 = $request->get('pilihan');

      if($G2 == "G2"){
        $gejalas = Gejala::all();
        return view('pages.g6', compact('gejalas'));
      }else{
        return view('pages.h2');
      }
    }

    public function postG6(Request $request)
    {
      //jenis warna darah merah segar
      $sg6 = $request->session()->put('sg6', $request->input('pilihan'));
      $G6 = $request->get('pilihan');

      if($G6 == "G6"){
        $gejalas = Gejala::all();
        return view('pages.g4', compact('gejalas'));
      }else{
        $gejalas = Gejala::all();
        return view('pages.g5', compact('gejalas'));
      }
    }



    public function postG4(Request $request)
    {
      //Frekuensi darah banyak
      $sg4 = $request->session()->put('sg4', $request->input('pilihan'));
      $sg3 = $request->session()->put('sg3', $request->input('pilihan'));
      $G4 = $request->get('pilihan');
      $sg6 = $request->session()->get('sg6');

      $sg2 = $request->session()->get('sg2');
      $sg5 = $request->session()->get('sg5');
      // dd($sg5);

      if($G4 == "G4"){
        $gejalas = Gejala::all();
        return view('pages.g8', compact('gejalas'));
      }elseif($sg2 == "G2" && $sg5 == "G5" && $G4 == "G3"){
        $gejalas = Gejala::all();
        $request->session()->forget('sg5');
        $request->session()->forget('sg2');
        return view('pages.flex', compact('gejalas'));
      }elseif($sg2 == "G2" && $sg6 == "G6" && $G4 == "G3"){
        $gejalas = Gejala::all();
        return view('pages.g8', compact('gejalas'));
      }else{
        $gejalas = Gejala::all();
        return view('pages.g8', compact('gejalas'));
      }
    }




    public function postG8(Request $request)
    {
      //Perut terasa nyeri
      $sg8 = $request->session()->put('sg8', $request->input('pilihan'));
      $sg7 = $request->session()->put('sg7', $request->input('pilihan'));
      $G8 = $request->get('pilihan');


      $sg2 = $request->session()->get('sg2');
      $sg5 = $request->session()->get('sg5');
      $sg4 = $request->session()->get('sg4');

      if($G8 == "G8"){
        $gejalas = Gejala::all();
        return view('pages.g1', compact('gejalas'));
      }elseif($sg2 == "G2" && $sg5 == "G5" && $sg4 == "G4" && $G8 == "G7"){
        $gejalas = Gejala::all();
        $request->session()->forget(['sg2','sg5','sg4']);
        return view('pages.imminens', compact('gejalas'));
      }else{
        $gejalas = Gejala::all();
        return view('pages.g1', compact('gejalas'));
      }
    }




    public function postG1(Request $request)
    {
      //Mengambil Session
      $sg2 = $request->session()->get('sg2');
      $sg4 = $request->session()->get('sg4');
      $sg6 = $request->session()->get('sg6');
      $sg8 = $request->session()->get('sg8');

      $sg5 = $request->session()->get('sg5');

      $sg3 = $request->session()->get('sg3');
      $sg7 = $request->session()->get('sg7'); //untuk kasus tidak yang terakhir
      //Usia < 20 minggu
      $sg1 = $request->session()->put('sg1', $request->input('pilihan'));
      $G1 = $request->get('pilihan');

      if($G1 == "G1" && $sg2 == "G2" && $sg4 == "G4" && $sg6 == "G6" && $sg8 == "G8"){
        $gejalas = Gejala::all();
        $request->session()->forget(['sg2', 'sg4', 'sg6', 'sg8']);
        return view('pages.insipiens', compact('gejalas'));
      }elseif ($G1 == "G1" && $sg2 == "G2" && $sg4 == "G4" && $sg5 == "G5" && $sg8 == "G8") {
        $gejalas = Gejala::all();
        $request->session()->forget(['sg2', 'sg4', 'sg5', 'sg8']);
        return view('pages.imminens', compact('gejalas'));
      }elseif ($G1 == "G1" && $sg2 == "G2"  && $sg3 == "G3" && $sg8 == "G8") {
        $gejalas = Gejala::all();
        $request->session()->forget(['sg2', 'sg3', 'sg8']);
        return view('pages.insipiens', compact('gejalas'));
      }elseif ($G1 == "G1" && $sg2 == "G2"  && $sg3 == "G3" &&  $sg7 == "G7") {
        $gejalas = Gejala::all();
        $request->session()->forget(['sg2', 'sg3', 'sg7']);
        return view('pages.imminens', compact('gejalas'));
      }elseif($G1 == "G1" && $sg2 == "G2" && $sg4 == "G4" && $sg6 == "G6" && $sg7 == "G7"){
        $gejalas = Gejala::all();
        $request->session()->forget(['sg2', 'sg4', 'sg6', 'sg7']);
        return view('pages.imminens', compact('gejalas'));
      }elseif($G1 == "tidak" && $sg2 == "G2" && $sg4 == "G4" && $sg6 == "G6" && $sg7 == "G7"){
        $request->session()->forget(['sg2', 'sg4', 'sg6', 'sg7']);
        return view('pages.inkomplit');
      }elseif($sg2 == "G2" && $sg5 == "G5" && $sg4 == "G4" && $sg8 == "G8" && $G1 == "tidak"){
        $request->session()->forget(['sg2','sg5','sg4', 'sg8']);
        return view('pages.inkomplit');
      }else{
        $request->session()->forget(['sg2', 'sg4', 'sg6', 'sg8']);
        return view('pages.komplit');
      }
    }



    public function postG5(Request $request)
    {
      //Berwarna Kecoklatan
      $sg5 = $request->session()->put('sg5', $request->input('pilihan'));
      $G5 = $request->get('pilihan');

      if($G5 == "G5"){
        $gejalas = Gejala::all();
        return view('pages.g4', compact('gejalas'));
      }else{
        $gejalas = Gejala::all();
        $request->session()->forget('sg2');
        return view('pages.flex', compact('gejalas'));
      }
    }




    //
    // public function postG56(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //   // dd($pilihan);
    //
    //   if($pilihan == "G4"){
    //     $gejalas = Gejala::all();
    //     return view('pages.g6', compact('gejalas'));
    //   }else{
    //     $gejalas = Gejala::all();
    //     return view('pages.g5', compact('gejalas'));
    //   }
    // }
    //
    // public function postG5(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //   // dd($pilihan);
    //
    //   if($pilihan == "G5"){
    //     $gejalas = Gejala::all();
    //     return view('pages.g78', compact('gejalas'));
    //   }else{
    //     $gejalas = Gejala::all();
    //     return view('pages.h2', compact('gejalas'));
    //   }
    // }
    //
    // public function postG6(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //   // dd($pilihan);
    //
    //   if($pilihan == "G6"){
    //     $gejalas = Gejala::all();
    //     return view('pages.g78', compact('gejalas'));
    //   }else{
    //     $gejalas = Gejala::all();
    //     return view('pages.h2', compact('gejalas'));
    //   }
    // }
    //
    // public function postG78(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //   // dd($pilihan);
    //
    //   if($pilihan == "G8"){
    //     $gejalas = Gejala::all();
    //     return view('pages.g9', compact('gejalas'));
    //   }else{
    //     $gejalas = Gejala::all();
    //     return view('pages.g10', compact('gejalas'));
    //   }
    // }
    //
    //
    // public function postG9(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //   // dd($pilihan);
    //
    //   if($pilihan == "G9"){
    //     $gejalas = Gejala::all();
    //     return view('pages.insipiens', compact('gejalas'));
    //   }else{
    //     $gejalas = Gejala::all();
    //     return view('pages.h2', compact('gejalas'));
    //   }
    // }
    //
    // public function postG10(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //   // dd($pilihan);
    //
    //   if($pilihan == "G10"){
    //     $gejalas = Gejala::all();
    //     return view('pages.imminens', compact('gejalas'));
    //   }else{
    //     $gejalas = Gejala::all();
    //     return view('pages.h', compact('gejalas'));
    //   }
    // }



    // public function postG4(Request $request)
    // {
    //   $pilihan = $request->get('pilihan');
    //
    //
    //   if($pilihan == true){
    //     $gejalas = Gejala::all();
    //     return view('pages.g4', compact('gejalas'));
    //   }else{
    //     return view('pages.tidak');
    //   }
    // }
}

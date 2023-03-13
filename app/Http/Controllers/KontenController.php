<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;
use App\Models\Kuliner;
use App\Models\Wisata;
use App\Models\Utama;

class KontenController extends Controller
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
       $utama = Utama::all();

       return view('home') -> with('utama',$utama);

   }

  protected function create(Request $req) {

        $req->validate([
          'gambar' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
          'gambarbackground' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $req->file('gambar')->getClientOriginalExtension();
        $req->file('gambar')->store('gambarkonten','public');
        $imageName2 = time() . '.' . $req->file('gambarbackground')->getClientOriginalExtension();
        $req->file('gambarbackground')->store('gambarkontenback','public');

    if($req->input('kategori') == 'Budaya') {
      Budaya::create([
        'nama' => $req->input('nama'),
        'uraian' => $req->input('uraian'),
        'isi' => $req->input('isi'),
        'jamoperasi' => $req->input('jamoperasi'),
        'alamat' => $req->input('alamat'),
        'no_telp' => $req->input('no_telp'),
        'gambar' => $req->file('gambar'),
        'gambarbackground' => $req->file('gambarbackground'),
      ]);
      Utama::create([
        'nama' => $req->input('nama'),
        'uraian' => $req->input('uraian'),
        'isi' => $req->input('isi'),
        'jamoperasi' => $req->input('jamoperasi'),
        'alamat' => $req->input('alamat'),
        'no_telp' => $req->input('no_telp'),
        'gambar' => $req->file('gambar'),
        'gambarbackground' => $req->file('gambarbackground'),
      ]);
    }
    elseif ($req->input('kategori') == 'Kuliner') {
      Kuliner::create([
        'nama' => $req->input('nama'),
        'uraian' => $req->input('uraian'),
        'isi' => $req->input('isi'),
        'jamoperasi' => $req->input('jamoperasi'),
        'alamat' => $req->input('alamat'),
        'no_telp' => $req->input('no_telp'),
        'gambar' => $req->file('gambar'),
        'gambarbackground' => $req->file('gambarbackground'),
      ]);
      Utama::create([
        'nama' => $req->input('nama'),
        'uraian' => $req->input('uraian'),
        'isi' => $req->input('isi'),
        'jamoperasi' => $req->input('jamoperasi'),
        'alamat' => $req->input('alamat'),
        'no_telp' => $req->input('no_telp'),
        'gambar' => $req->file('gambar'),
        'gambarbackground' => $req->file('gambarbackground'),
      ]);
    }
    else{
      Wisata::create([
        'nama' => $req->input('nama'),
        'uraian' => $req->input('uraian'),
        'isi' => $req->input('isi'),
        'jamoperasi' => $req->input('jamoperasi'),
        'alamat' => $req->input('alamat'),
        'no_telp' => $req->input('no_telp'),
        'gambar' => $req->file('gambar'),
        'gambarbackground' => $req->file('gambarbackground'),
      ]);
      Utama::create([
        'nama' => $req->input('nama'),
        'uraian' => $req->input('uraian'),
        'isi' => $req->input('isi'),
        'jamoperasi' => $req->input('jamoperasi'),
        'alamat' => $req->input('alamat'),
        'no_telp' => $req->input('no_telp'),
        'gambar' => $req->file('gambar'),
        'gambarbackground' => $req->file('gambarbackground'),
      ]);
    }
    return redirect()->route('home');
  }
}

<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Saran;
class SaranController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('saran');
    }
    protected function create(Request $req) {

      if ($req->hasFile('file')) {
        $req->validate([
          'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      $imageName = time() . '.' . $req->file('file')->getClientOriginalExtension();
      $req->file('file')->store('gambarsaran','public');
      }
      Saran::create([
        'name' => $req->input('nama'),
        'nama_tempat' => $req->input('namatempat'),
        'lokasi' =>  $req->input('lokasi'),
        'kategori' => $req->input('kategori'),
        'alasan' => $req->input('alasan'),
        'gambar' => $req->file,
      ]);

      return view('home');
    }
}

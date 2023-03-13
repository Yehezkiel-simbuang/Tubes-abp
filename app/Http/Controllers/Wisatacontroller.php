<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
class Wisatacontroller extends Controller
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
    $wisata = Wisata::all();

    return view('wisata') -> with('wisata',$wisata);
  }
  public function wisatadetail($id)
  {
      $wisata = Wisata::findOrFail($id);
      return view('wisatakonten',compact('wisata'));
  }
}

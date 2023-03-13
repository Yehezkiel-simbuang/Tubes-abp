<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kuliner;
class KulinerController extends Controller
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
    $kuliner = Kuliner::all();

    return view('kuliner') -> with('kuliner',$kuliner);
  }
  public function kulinerdetail($id)
  {
      $kuliner = Kuliner::findOrFail($id);
      return view('kulinerkonten',compact('kuliner'));
  }
}

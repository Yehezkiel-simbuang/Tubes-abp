<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;
class BudayaController extends Controller
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
    $budaya = Budaya::all();

    return view('budaya') -> with('budaya',$budaya);
  }
  public function budayadetail($id)
  {
      $budaya = Budaya::findOrFail($id);
      return view('budayakonten',compact('budaya'));
  }
}

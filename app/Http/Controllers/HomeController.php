<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utama;
use App\Helpers\ApiFormatter;


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
        $utama = Utama::all();
        return view('home') -> with('utama',$utama);

    }
    public function detail($id)
    {
        $utama = Utama::findOrFail($id);
        return view('konten',compact('utama'));
    }

    #public function destroy($id)
    #{
  #    Utama::findOrFail($id)->delete();
  #    return redirect()->back();
  #  }

}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Utama;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class WisataController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wisata = Wisata::all();
        if($wisata){
          return ApiFormatter::createApi(200,'Success',$wisata);
        }else{
          return ApiFormatter::createApi(400,"Failed");
        }

    }
    public function destroy($id) {
      $wisata = Wisata::findOrFail($id);

      $name = $wisata->get();
      #var_dump($name[0]->nama);
      $data = $wisata->delete();

      $utama = Utama::where('nama','=',$name[0]->nama);
      $data1 = $utama->delete();
      if($data && $data1){
        return ApiFormatter::createApi(200,'Success');
      }else{
        return ApiFormatter::createApi(400,"Failed");
      }
    }

}

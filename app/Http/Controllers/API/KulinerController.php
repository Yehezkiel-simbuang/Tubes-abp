<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Kuliner;
use App\Models\Utama;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class KulinerController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kuliner = Kuliner::all();
        if($kuliner){
          return ApiFormatter::createApi(200,'Success',$kuliner);
        }else{
          return ApiFormatter::createApi(400,"Failed");
        }

    }
    public function destroy($id) {
      $kuliner = Kuliner::findOrFail($id);

      $name = $kuliner->get();
      #var_dump($name[0]->nama);
      $data = $kuliner->delete();

      $utama = Utama::where('nama','=',$name[0]->nama);
      $data1 = $utama->delete();
      if($data && $data1){
        return ApiFormatter::createApi(200,'Success');
      }else{
        return ApiFormatter::createApi(400,"Failed");
      }
    }

}

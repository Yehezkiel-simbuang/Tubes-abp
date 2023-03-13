<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Budaya;
use App\Models\Utama;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class BudayaController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $budaya = Budaya::all();
        if($budaya){
          return ApiFormatter::createApi(200,'Success',$budaya);
        }else{
          return ApiFormatter::createApi(400,"Failed");
        }

    }
    public function destroy($id) {
      $budaya = Budaya::findOrFail($id);

      $name = $budaya->get();
      #var_dump($name[0]->nama);
      $data = $budaya->delete();

      $utama = Utama::where('nama','=',$name[0]->nama);
      $data1 = $utama->delete();
      if($data && $data1){
        return ApiFormatter::createApi(200,'Success');
      }else{
        return ApiFormatter::createApi(400,"Failed");
      }
    }

}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Saran;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class SaranController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $saran = Saran::all();
        if($saran){
          return ApiFormatter::createApi(200,'Success',$saran);
        }else{
          return ApiFormatter::createApi(400,"Failed");
        }
    }
    public function destroy($id) {
      $saran = Saran::findOrFail($id);
      $data = $saran->delete();
      if($data){
        return ApiFormatter::createApi(200,'Success');
      }else{
        return ApiFormatter::createApi(400,"Failed");
      }
    }

}

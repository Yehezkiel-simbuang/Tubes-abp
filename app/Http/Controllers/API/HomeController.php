<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Utama;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $utama = Utama::all();
        if($utama){
          return ApiFormatter::createApi(200,'Success',$utama);
        }else{
          return ApiFormatter::createApi(400,"Failed");
        }

    }

}

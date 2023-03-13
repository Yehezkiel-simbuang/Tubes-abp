<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        if($user){
          return ApiFormatter::createApi(200,'Success',$user);
        }else{
          return ApiFormatter::createApi(400,"Failed");
        }

    }
    public function destroy($id) {
      $user = User::findOrFail($id);
      $name = $user->get();
      #var_dump($name[0]->role);
      $data = $user->delete();
      if($name[0]->role != 'admin'){
        $data = $user->delete();
        return ApiFormatter::createApi(200,'Success');
      }else{
        return ApiFormatter::createApi(400,"Failed");
      }
 }

}

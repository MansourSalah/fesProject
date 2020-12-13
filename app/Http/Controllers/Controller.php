<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function forget_all(){
        Session::flush();
    }
    public function put_s($key,$value){
        Session::put($key,$value);
    }
    public function get_s($key){
        return Session::get($key);
    }
    public function forget_s($key){
        Session::forget($key);
    }
    public function has_s($key){
        return Session::has($key);
    }
}

<?php

namespace App\Http\Middleware;

class Activity {

//    //前置
//    public function handle ($req, \Closure $next) {
//
//        if (time() < strtotime('2018-04-21')){
//            return redirect('activity0');
//        }
//        return $next($req);
//
//    }

    //后置
    public function handle ($req, \Closure $next) {


        $res = $next($req);

        echo $res;
        //逻辑
//        echo '我是后置操作';

    }

}
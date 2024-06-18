<?php



if(!function_exists('admin')){
    function admin()
    {
       return \App\Http\Middleware\AdminMiddleware::class;

    }
}

if(!function_exists('user')){
    function user()
    {
       return \App\Http\Middleware\UserMiddleware::class;

    }
}





?>
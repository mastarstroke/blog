<?php

if(!function_exists('sendUserPostEmail')){
    function sendUserPostEmail($email, $user)
    {
        \Mail::to($email)->send(new App\Mail\CommentEmail($user));
    }
}




?>
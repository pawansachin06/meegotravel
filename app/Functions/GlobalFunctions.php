<?php

use App\Mail\ErrorMail;
use Hidehalo\Nanoid\Client;
use Illuminate\Support\Facades\Mail;

function nanoid($length = 36){
    $client = new Client();
    $chars = '0123456789';
    $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return $client->formattedId($chars, $length);
}


function error_mail($title, $data){
    Mail::send(new ErrorMail($title, $data));
}

function mailer(){

}


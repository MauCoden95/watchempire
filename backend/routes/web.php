<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ConfirmationCode;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::get('send-mail',function(){
    Mail::to('migmauro95@gmail.com')->send(new ConfirmationCode);

    return "Mensaje enviado";
})->name('send-mail');
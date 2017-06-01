<?php

use App\myClasses\dbConnection;
use App\myClasses\logData;
use App\myClasses\Type;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
Route::post('/logIn', function () {
    if(logData::logIn($_POST['email'], $_POST['pass']))
    {
        return redirect('/dashboard');
    }
    return redirect('/?error=signin');
});
Route::get('/dashboard', function () {
    if(Type::isUser())
    {
        return view('User/index');
    }
    elseif(Type::isSUser())
    {
        return view('SUser/index');
    }
    else
    {
        return redirect('/');
    }
});
Route::get('/logOut', function () {
    logData::logOut();
    return redirect('/');
});
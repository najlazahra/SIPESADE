<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/pengumuman', function () { return view('pengumuman'); });
Route::get('/dokumentasi', function () { return view('dokumentasi'); });
Route::get('/faq', function () { return view('faq'); });
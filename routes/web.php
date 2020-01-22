<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Stories@index')->name('home');
Route::get('/story/{id}', 'Stories@story', function ($id){return $id;})->name('story');
Route::get('/tags/', 'Stories@tags')->name('tags');
Route::get('/tags/{id}', 'Stories@tag', function ($id){return $id;})->name('tag');
Route::get('/about', 'Stories@about')->name('about');

// API calls
Route::get('/api', 'API@sampleDocumentation');
Route::post('/api/postStory', 'API@postStory');
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

Route::get('/', function () {
    return redirect(route('question.index'));
});

Route::resource('question', 'Question')->only(['index', 'create', 'store', 'show']);

Route::post('question/{question_id}/answer', 'Answer@store')->name('answer.store');

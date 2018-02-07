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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::resource('subcategory','SubCategoryController');

Route::get('category', 'CategoryController@index');
*/

Route::get('questions', 'Question1Controller@index');

Route::get('question1', 'Question1Controller@question1')->name('questions.question1');

Route::post('question1', 'Question1Controller@answer1')->name('questions.answer1');

Route::get('question2', 'Question1Controller@question2')->name('questions.question2');
Route::get('question3', 'Question1Controller@question3')->name('questions.question3');
Route::get('question4', 'Question1Controller@question4')->name('questions.question4');

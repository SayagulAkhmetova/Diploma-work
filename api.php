<?php

use Illuminate\Support\Facades\Route;


Route::resource('users', 'API\UserController');

Route::post('documents/bookmark', 'API\DocController@bookmark');
Route::delete('documents/bookmark', 'API\DocController@removeBookmark');
Route::get('documents/bookmark', 'API\DocController@bookmarked');


Route::get('documents/rating', 'API\DocController@rating');
Route::post('documents/{document}', 'API\DocController@update');
Route::apiResource('documents', 'API\DocController');
Route::get('documents/{document}/download', 'API\DocController@download');

Route::get('categories', 'CategoryController@index');




Route::get('reports', 'Research\IndexController@index');
Route::put('reports', 'Research\IndexController@store');
Route::delete('reports/{id}', 'Research\IndexController@delete');


Route::resource('educations', 'Research\EducationController');

Route::resource('researches', 'Research\ResearchController');

Route::resource('additionls', 'Research\AdditionalController');

Route::resource('socials', 'Research\SocialController');

Route::get('search', 'SearchController@search');


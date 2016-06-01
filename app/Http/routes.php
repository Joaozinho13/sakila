<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Actor/actors', 'Actor\\ActorsController');
Route::resource('Category/category', 'Category\\CategoryController');
Route::resource('Country/country', 'Country\\CountryController');
Route::resource('Language/language', 'Language\\LanguageController');
Route::resource('FilmText/film-text', 'FilmText\\FilmTextController');
Route::resource('City/city', 'City\\CityController');
Route::resource('Address/address', 'Address\\AddressController');
Route::resource('Film/film', 'Film\\FilmController');
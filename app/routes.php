<?php


Route::get('/', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::controller('user', 'UserController');

Route::get('/city_list/{county_id}', 'HomeController@city_list');
Route::post('/search_result', array('before' => 'csrf', 'uses' => 'HomeController@search_result'));

Route::group(array('prefix' => 'admin'), function()
{
    Route::resource('properties',     'PropertyAdminController');
    Route::get('/city_list/{count_id}', 'PropertyAdminController@city_list');
});

HTML::macro('clever_link', function($route, $text) {
    if( Request::path() == $route ) {
        $active = "class = 'active'";
    }
    else {
        $active = '';
    }

    return '<li ' . $active . '>' . link_to($route, $text) . '</li>';
});




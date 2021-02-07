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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'cors'], function ()
{
    Route::get('/performers/{rank}/{page}', 'CoinsController@getPerformers');
    Route::get('/coins/{page}', 'CoinsController@getCoins');
    Route::get('/coin/{symbol}', 'CoinsController@getSingle');
    Route::get('/ath/{symbol}', 'ATHController@ath');
    Route::get('/timeline/{symbol}', 'CoinsController@getPostTimeline');
    Route::get('/allposts/{rank}/{page}', 'CoinsController@getAllPosts');
    Route::get('/posts/{symbol}/{page}', 'CoinsController@getPosts');
    Route::get('/search', 'CoinsController@getAllCoins');
    Route::get('/heatmap/{page}', 'HeatMapController@getHeatMap');
    Route::get('/info/{bizRank}', 'InfoController@getAllValues');
    Route::get('/news/{page}', 'NewsController@getNews');
    Route::get('/biz/{rank}/{page}', 'BizController@getBiz');
});

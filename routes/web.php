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
    Route::get('/home/{performerLimit}/{mentionLimit}', 'HomeController@getHome');
    Route::get('/ath/{symbol}', 'ATHController@ath');
    Route::get('/performers/{rank}/{page}', 'CoinsController@getPerformers');
    Route::get('/coins/{page}', 'CoinsController@getCoins');
    Route::get('/coin/{symbol}', 'CoinsController@getSingle');
    Route::get('/search', 'CoinsController@getAllCoins');
    Route::get('/info/{rank}', 'InfoController@getAllValues');
    Route::get('/news/{source}/{page}', 'NewsController@getNews');
    Route::get('/heatmap/{page}', 'HeatMapController@getHeatMap');
    Route::get('/posts/all/{source}/{rank}/{page}', 'MentionsController@getAllPosts');
    Route::get('/posts/symbol/{source}/{symbol}/{page}', 'MentionsController@getSymbolPosts');
    Route::get('/mentions/{source}/{rank}', 'MentionsController@get24HMentions');
    Route::get('/timeline/{source}/{symbol}', 'MentionsController@getPostTimeline');
});

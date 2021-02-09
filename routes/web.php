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

    Route::get('/allposts/biz/{rank}/{page}', 'CoinsController@getAllPosts');
    Route::get('/posts/biz/{symbol}/{page}', 'CoinsController@getPosts');
    Route::get('/allposts/reddit/{rank}/{page}', 'CoinsController@redditGetAllPosts');
    Route::get('/posts/reddit/{symbol}/{page}', 'CoinsController@redditGetPosts');

    Route::get('/search', 'CoinsController@getAllCoins');
    Route::get('/heatmap/{page}', 'HeatMapController@getHeatMap');
    Route::get('/info/{bizRank}', 'InfoController@getAllValues');
    Route::get('/news/hl/{page}', 'NewsController@getNews');
    Route::get('/news/hn/{page}', 'NewsController@getHNNews');

    Route::get('/biz/{rank}/{page}', 'BizController@getBiz');
    Route::get('/reddit/{rank}/{page}', 'RedditController@getReddit');
});

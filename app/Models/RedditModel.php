<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RedditModel extends Model
{
    protected $table = 'reddit_counts_24h';

    public function getReddit($rank, $page) {
        return RedditModel::select('name_count', 'symbol_count', 'total',
            'rank', 'name', 'symbol', 'name_count_prev', 'total_prev')
            ->join('coins', 'coins.coin_id', '=', 'reddit_counts_24h.coin_id')
            ->where('coins.rank', '<=', $rank)
            ->where('total', '>', 0)
            ->orderBy('total', 'DESC')
            ->skip($page * 50)
            ->limit(50)
            ->get();
    }

    public function getRedditInfo($rank) {
        return RedditModel::select('total',
            'symbol')
            ->join('coins', 'coins.coin_id', '=', 'reddit_counts_24h.coin_id')
            ->where('coins.rank', '<=', $rank)
            ->where('total', '>', 0)
            ->orderBy('total', 'DESC')
            ->limit(3)
            ->get();
    }}

<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class CoinsModel extends Model
{
    protected $table = 'coins';

    public function getPerformers($changeType, $order, $rankLimit, $page) {
        return CoinsModel::select($changeType . ' as change', 'name', 'symbol')
            ->where('rank', '<=', $rankLimit)
            ->orderBy($changeType, $order)
            ->skip($page * 10)
            ->limit(10)
            ->get();
    }

    public function getSingle($symbol) {
        return CoinsModel::select('*')
            ->where('symbol', '=', $symbol)
            ->get();
    }

    public function getCoins($page) {
        return CoinsModel::select('*')
            ->orderBy('rank', 'ASC')
            ->skip($page * 50)
            ->limit(50)
            ->get();
    }

    public function getAllCoins() {
        return CoinsModel::select('*')
            ->orderBy('rank', 'ASC')
            ->get();
    }

    public function getPostTimeline($symbol) {
        return CoinsModel::select('biz_timeline.time', 'biz_timeline.mentions',
            'biz_total_posts.*')
            ->where('symbol', '=', $symbol)
            ->join('biz_timeline', 'biz_timeline.coin_id', '=',
                'coins.coin_id')
            ->join('biz_total_posts', 'biz_total_posts.time', '=',
                'biz_timeline.time')
            ->orderBy('biz_timeline.time', 'DESC')
            ->get();
    }

    public function getAllPosts($rank, $page) {
        return CoinsModel::select('biz_posts.*', 'coins.symbol')
            ->join('biz_relations', 'biz_relations.coin_id', '=',
                'coins.coin_id')
            ->join('biz_posts', 'biz_posts.post_id', '=',
                'biz_relations.post_id')
            ->where('coins.rank', '<=', $rank)
            ->orderBy('biz_posts.time', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }

    public function getPosts($symbol, $page) {
        return CoinsModel::select('biz_posts.*', 'coins.symbol')
            ->where('symbol', '=', $symbol)
            ->join('biz_relations', 'biz_relations.coin_id', '=',
                'coins.coin_id')
            ->join('biz_posts', 'biz_posts.post_id', '=',
                'biz_relations.post_id')
            ->orderBy('time', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }
}

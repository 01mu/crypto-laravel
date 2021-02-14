<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MentionsModel extends Model
{
    protected $table = 'mention_counts_24h';

    public function getTopMentions($source, $rank) {
        return MentionsModel::select('name_count', 'symbol_count', 'total',
            'rank', 'name', 'symbol', 'name_count_prev', 'total_prev')
            ->join('coins', 'coins.coin_id', '=', 'mention_counts_24h.coin_id')
            ->where('coins.rank', '<=', $rank)
            ->where('total', '>', 0)
            ->where('source', '=', $source)
            ->orderBy('total', 'DESC')
            ->limit(10)
            ->get();
    }

    public function get24HMentions($source, $rank) {
        return MentionsModel::select('name_count', 'symbol_count', 'total',
            'rank', 'name', 'symbol', 'name_count_prev', 'total_prev')
            ->join('coins', 'coins.coin_id', '=', 'mention_counts_24h.coin_id')
            ->where('coins.rank', '<=', $rank)
            ->where('total', '>', 0)
            ->where('source', '=', $source)
            ->orderBy('total', 'DESC')
            ->get();
    }

    public function getAllPosts($source, $rank, $page) {
        return CoinsModel::select('mention_posts.*', 'coins.symbol')
            ->join('mention_relations', 'mention_relations.coin_id', '=',
                'coins.coin_id')
            ->join('mention_posts', 'mention_posts.post_id', '=',
                'mention_relations.post_id')
            ->where('coins.rank', '<=', $rank)
            ->where('mention_posts.source', '=', $source)
            ->orderBy('mention_posts.time', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }

    public function getSymbolPosts($source, $symbol, $page) {
        return CoinsModel::select('mention_posts.*', 'coins.symbol')
            ->where('symbol', '=', $symbol)
            ->where('mention_posts.source', '=', $source)
            ->join('mention_relations', 'mention_relations.coin_id', '=',
                'coins.coin_id')
            ->join('mention_posts', 'mention_posts.post_id', '=',
                'mention_relations.post_id')
            ->orderBy('time', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }

    public function getInfo($rank, $source) {
        return CoinsModel::select('total', 'symbol')
            ->join('mention_counts_24h', 'coins.coin_id', '=',
                'mention_counts_24h.coin_id')
            ->where('coins.rank', '<=', $rank)
            ->where('total', '>', 0)
            ->where('source', '=', $source)
            ->orderBy('total', 'DESC')
            ->limit(3)
            ->get();
    }

    public function getPostTimeline($source, $symbol) {
        return CoinsModel::select('mention_timeline.time',
                'mention_timeline.mentions', 'mention_total_posts.*')
            ->where('symbol', '=', $symbol)
            ->where('mention_timeline.source', '=', $source)
            ->join('mention_timeline', 'mention_timeline.coin_id', '=',
                'coins.coin_id')
            ->join('mention_total_posts', 'mention_total_posts.time', '=',
                'mention_timeline.time')
            ->orderBy('mention_timeline.time', 'DESC')
            ->get();
    }
}

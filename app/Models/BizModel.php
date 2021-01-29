<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class BizModel extends Model
{
    protected $table = 'biz_counts_24h';

    public function getBiz($rank, $page) {
        return BizModel::select('name_count', 'symbol_count', 'total',
            'rank', 'name', 'symbol', 'name_count_prev', 'total_prev')
            ->join('coins', 'coins.coin_id', '=', 'biz_counts_24h.coin_id')
            ->where('coins.rank', '<=', $rank)
            ->where('total', '>', 0)
            ->orderBy('total', 'DESC')
            ->skip($page * 50)
            ->limit(50)
            ->get();
    }
}

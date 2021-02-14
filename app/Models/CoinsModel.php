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

    public function getAllCoins() {
        return CoinsModel::select('*')
            ->orderBy('rank', 'ASC')
            ->get();
    }

    public function getTopCoins() {
        return CoinsModel::select('*')
            ->orderBy('rank', 'ASC')
            ->limit(10)
            ->get();
    }

    public function getCoins($page) {
        return CoinsModel::select('*')
            ->orderBy('rank', 'ASC')
            ->skip($page * 50)
            ->limit(50)
            ->get();
    }
}

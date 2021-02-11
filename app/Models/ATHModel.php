<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class ATHModel extends Model
{
    protected $table = 'ath';

    public function getATH($symbol) {
        return ATHModel::select('ath', 'time')
            ->join('coins', 'coins.coin_id', '=', 'ath.coin_id')
            ->where('symbol', '=', $symbol)
            ->orderBy('time', 'DESC')
            ->get();
    }
}

<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class ATHModel extends Model
{
    protected $table = 'ath';

    public function getATH($symbol) {
        return ATHModel::select('ath', 'time')
            ->where('symbol', '=', $symbol)
            ->orderBy('time', 'DESC')
            ->get();
    }
}

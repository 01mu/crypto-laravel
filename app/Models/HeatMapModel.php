<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class HeatMapModel extends Model
{
    protected $table = 'heat_map';

    public function getHeatMap($page) {
        $response = [];

        $symbols = CoinsModel::select('symbol')
            ->orderBy('rank', 'ASC')
            ->skip($page * 10)
            ->limit(10)
            ->get();

        foreach ($symbols as $symbol) {
            $response[] = HeatMapModel::select('symbol', 'time', 'difference')
                ->join('coins', 'heat_map.coin_id', '=', 'coins.coin_id')
                ->where('symbol', '=', $symbol['symbol'])
                ->orderBy('time', 'ASC')
                ->get();
        }

        return $response;
    }
}

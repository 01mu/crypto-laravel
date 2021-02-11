<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class HeatMapModel extends Model
{
    protected $table = 'heatmap';

    public function getHeatMap($page) {
        $response = [];

        $symbols = CoinsModel::select('symbol')
            ->orderBy('rank', 'ASC')
            ->skip($page * 10)
            ->limit(10)
            ->get();

        foreach ($symbols as $symbol) {
            $response[] = HeatMapModel::select('symbol', 'time', 'difference')
                ->join('coins', 'heatmap.coin_id', '=', 'coins.coin_id')
                ->where('symbol', '=', $symbol['symbol'])
                ->orderBy('time', 'ASC')
                ->get();
        }

        return $response;
    }
}

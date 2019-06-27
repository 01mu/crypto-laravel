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
            ->skip($page * 20)
            ->limit(20)
            ->get();
    }
}

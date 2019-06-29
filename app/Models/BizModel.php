<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class BizModel extends Model
{
    protected $table = 'biz_counts';

    public function getBiz($rank, $page) {
        return BizModel::select('*')
            ->where('rank', '<=', $rank)
            ->orderBy('mention_count', 'DESC')
            ->skip($page * 50)
            ->limit(50)
            ->get();
    }
}

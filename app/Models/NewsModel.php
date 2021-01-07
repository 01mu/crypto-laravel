<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function getNews($page) {
        return NewsModel::select('*')
            ->orderBy('published', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }
}

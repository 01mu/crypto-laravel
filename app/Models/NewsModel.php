<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function getNews($page) {
        return NewsModel::select('*')
            ->where('source', '!=', 'Hacker News')
            ->orderBy('published', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }

    public function getRecentNews($type) {
        if ($type === 'hn') {
            return NewsModel::select('*')
                ->where('source', '=', 'Hacker News')
                ->orderBy('published', 'DESC')
                ->limit(5)
                ->get();
        } else {
            return NewsModel::select('*')
                ->where('source', '!=', 'Hacker News')
                ->orderBy('published', 'DESC')
                ->limit(5)
                ->get();
        }
    }

    public function getHNNews($page) {
        return NewsModel::select('*')
            ->where('source', '=', 'Hacker News')
            ->orderBy('published', 'DESC')
            ->skip($page * 25)
            ->limit(25)
            ->get();
    }
}

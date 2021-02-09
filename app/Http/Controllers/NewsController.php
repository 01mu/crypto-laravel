<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\NewsModel;

class NewsController extends Controller
{
    public function getNews($page) {
        $nm = new NewsModel;

        echo json_encode($nm->getNews($page));
    }

    public function getHNNews($page) {
        $nm = new NewsModel;

        echo json_encode($nm->getHNNews($page));
    }
}

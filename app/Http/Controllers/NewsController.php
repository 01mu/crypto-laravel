<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\NewsModel;
use Crypto\Models\KeyValueModel;

class NewsController extends Controller
{
    public function getNews($source, $page) {
        $response = [];

        if ($source !== 'hl' && $source !== 'hn') {
            $response['status'] = 'Failure';
            echo json_encode($response);
            return;
        }

        $nm = new NewsModel;
        $kvm = new KeyValueModel;

        $response['status'] = 'Success';

        if ($source === 'hl') {
            $response['news'] = $nm->getNews($page);
        } else {
            $response['news'] = $nm->getHNNews($page);
        }

        $response['last_update'] = $kvm->getValue('last_update_news');

        echo json_encode($response);
    }
}

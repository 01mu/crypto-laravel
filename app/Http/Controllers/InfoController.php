<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\BizModel;
use Crypto\Models\RedditModel;
use Crypto\Models\KeyValueModel;

class InfoController extends Controller
{
    public function getAllValues($bizRank) {
        $resposne = [];

        $kvm = new KeyValueModel;
        $bm = new BizModel;
        $rm = new RedditModel;

        $response['biz'] = $bm->getBizInfo($bizRank);
        $response['reddit'] = $rm->getRedditInfo($bizRank);
        $response['info'] = $kvm->getAllValues();

        echo json_encode($response);
    }
}

<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\BizModel;
use Crypto\Models\KeyValueModel;

class InfoController extends Controller
{
    public function getAllValues($bizRank) {
        $resposne = [];

        $kvm = new KeyValueModel;
        $bm = new BizModel;

        $response['biz'] = $bm->getBizInfo($bizRank);
        $response['info'] = $kvm->getAllValues();

        echo json_encode($response);
    }
}

<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\BizModel;
use Crypto\Models\KeyValueModel;

class BizController extends Controller
{
    public function getBiz($rank, $page) {
        $response = [];

        $bm = new BizModel;
        $kvm = new KeyValueModel;

        $response['biz'] = $bm->getBiz($rank, $page);

        $response['last_update_biz'] =
        $kvm->getValue('last_update_biz');

        echo json_encode($response);
    }
}

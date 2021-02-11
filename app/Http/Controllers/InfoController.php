<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\MentionsModel;
use Crypto\Models\KeyValueModel;

class InfoController extends Controller
{
    public function getAllValues($rank) {
        $response = [];

        $mm = new MentionsModel;
        $kvm = new KeyValueModel;

        $response['biz'] = $mm->getInfo($rank, 'biz');
        $response['reddit'] = $mm->getInfo($rank, 'reddit');
        $response['info'] = $kvm->getAllValues();

        echo json_encode($response);
    }
}

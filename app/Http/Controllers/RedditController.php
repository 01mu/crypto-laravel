<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\RedditModel;
use Crypto\Models\KeyValueModel;

class RedditController extends Controller
{
    public function getReddit($rank, $page) {
        $response = [];

        $bm = new RedditModel;
        $kvm = new KeyValueModel;

        $response['reddit'] = $bm->getReddit($rank, $page);

        $response['last_update_reddit'] =
        $kvm->getValue('last_update_reddit');

        echo json_encode($response);
    }
}

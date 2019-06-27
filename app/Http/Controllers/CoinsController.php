<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\CoinsModel;
use Crypto\Models\KeyValueModel;

class CoinsController extends Controller
{
    public function getPerformers($rankLimit, $page) {
        $response = [];

        $cm = new CoinsModel;
        $kvm = new KeyValueModel;

        $response['change_1h_asc'] =
            $cm->getPerformers('change_1h', 'ASC', $rankLimit, $page);
        $response['change_1h_desc'] =
            $cm->getPerformers('change_1h', 'DESC', $rankLimit, $page);
        $response['change_24h_asc'] =
            $cm->getPerformers('change_24h', 'ASC', $rankLimit, $page);
        $response['change_24h_desc'] =
            $cm->getPerformers('change_24h', 'DESC', $rankLimit, $page);
        $response['change_7d_asc'] =
            $cm->getPerformers('change_7d', 'ASC', $rankLimit, $page);
        $response['change_7d_desc'] =
            $cm->getPerformers('change_7d', 'DESC', $rankLimit, $page);
        $response['last_update_coins'] = $kvm->getValue('last_update_coins');

        echo json_encode($response);
    }

    public function getCoins($page) {
        $response = [];

        $cm = new CoinsModel;
        $kvm = new KeyValueModel;

        $response['coins'] = $cm->getCoins($page);
        $response['last_update_coins'] = $kvm->getValue('last_update_coins');

        echo json_encode($response);
    }
}

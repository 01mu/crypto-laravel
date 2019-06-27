<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\CoinsModel;

class CoinsController extends Controller
{
    public function getPerformers($rankLimit, $page) {
        $response = [];

        $cm = new CoinsModel;

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

        echo json_encode($response);
    }
}

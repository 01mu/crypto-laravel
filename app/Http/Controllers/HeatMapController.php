<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\HeatMapModel;
use Crypto\Models\KeyValueModel;

class HeatMapController extends Controller
{
    public function getHeatMap($page) {
        $response = [];

        $hmm = new HeatMapModel;
        $kvm = new KeyValueModel;

        $response['heat_map'] = $hmm->getHeatMap($page);
        $response['last_update_heat_map'] =
            $kvm->getValue('last_update_heat_map');

        echo json_encode($response);
    }
}

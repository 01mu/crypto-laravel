<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\KeyValueModel;

class InfoController extends Controller
{
    public function getAllValues() {
        $resposne = [];

        $kvm = new KeyValueModel;

        $response = $kvm->getAllValues();

        echo json_encode($response);
    }
}

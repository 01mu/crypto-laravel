<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\ATHModel;

class ATHController extends Controller
{
    public function ath($symbol) {
        $ath = new ATHModel;

        echo json_encode($ath->getATH($symbol));
    }
}

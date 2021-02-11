<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\MentionsModel;
use Crypto\Models\KeyValueModel;

class MentionsController extends Controller
{
    public function get24HMentions($source, $rank) {
        $response = [];

        if ($source !== 'biz' && $source !== 'reddit') {
            $response['status'] = 'Failure';
            echo json_encode($response);
            return;
        }

        $mm = new MentionsModel;
        $kvm = new KeyValueModel;

        $response['status'] = 'Success';
        $response['data'] = $mm->get24HMentions($source, $rank);
        $response['last_update'] = $kvm->getValue('last_update_' . $source);

        echo json_encode($response);
    }

    public function getAllPosts($source, $rank, $page) {
        $response = [];

        if ($source !== 'biz' && $source !== 'reddit') {
            $response['status'] = 'Failure';
            echo json_encode($response);
            return;
        }

        $mm = new MentionsModel;
        $kvm = new KeyValueModel;

        $last_update = 'last_update_' . $source . '_posts';

        $response['status'] = 'Success';
        $response['posts'] = $mm->getAllPosts($source, $rank, $page);
        $response['last_update'] = $kvm->getValue($last_update);

        echo json_encode($response);
    }

    public function getSymbolPosts($source, $symbol, $page) {
        $response = [];

        if ($source !== 'biz' && $source !== 'reddit') {
            $response['status'] = 'Failure';
            echo json_encode($response);
            return;
        }

        $mm = new MentionsModel;
        $kvm = new KeyValueModel;

        $last_update = 'last_update_' . $source . '_posts';

        $response['status'] = 'Success';
        $response['posts'] = $mm->getSymbolPosts($source, $symbol, $page);
        $response['last_update'] = $kvm->getValue($last_update);

        echo json_encode($response);
    }

    public function getPostTimeline($source, $symbol) {
        $response = [];

        if ($source !== 'biz' && $source !== 'reddit') {
            $response['status'] = 'Failure';
            echo json_encode($response);
            return;
        }

        $mm = new MentionsModel;

        $response['status'] = 'Success';
        $response['timeline'] = $mm->getPostTimeline($source, $symbol);

        echo json_encode($response);
    }
}

<?php

namespace Crypto\Http\Controllers;

use Illuminate\Http\Request;

use Crypto\Models\CoinsModel;
use Crypto\Models\KeyValueModel;
use Crypto\Models\NewsModel;
use Crypto\Models\MentionsModel;

class HomeController extends Controller
{
    public function index() {
        return '';
    }

    public function getHome($performerLimit, $mentionLimit) {
        $response = [];

        $cm = new CoinsModel;
        $kvm = new KeyValueModel;
        $nm = new NewsModel;
        $mm = new MentionsModel;

        $response['performers'] = HomeController::getPerformers($cm,
            $performerLimit, 0);

        $response['coins'] = $cm->getTopCoins();
        $response['hl'] = $nm->getRecentNews('hl');
        $response['hn'] = $nm->getRecentNews('hn');
        $response['biz_mentions'] = $mm->getTopMentions('biz', $mentionLimit);
        $response['reddit_mentions'] = $mm->getTopMentions('reddit',
            $mentionLimit);

        echo json_encode($response);
    }

    public function getPerformers($cm, $rankLimit, $page) {
        $response = [];

        $response['change_1h_asc'] =
            $cm->getPerformersMin('change_1h', 'ASC', $rankLimit, $page);
        $response['change_1h_desc'] =
            $cm->getPerformersMin('change_1h', 'DESC', $rankLimit, $page);
        $response['change_24h_asc'] =
            $cm->getPerformersMin('change_24h', 'ASC', $rankLimit, $page);
        $response['change_24h_desc'] =
            $cm->getPerformersMin('change_24h', 'DESC', $rankLimit, $page);
        $response['change_7d_asc'] =
            $cm->getPerformersMin('change_7d', 'ASC', $rankLimit, $page);
        $response['change_7d_desc'] =
            $cm->getPerformersMin('change_7d', 'DESC', $rankLimit, $page);

        return $response;
    }
}

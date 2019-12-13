<?php
require_once './backend/sql.php';
require_once './class/CashClass.php';
require_once './class/VideoClass.php';
require_once './class/MemberClass.php';

$cash = new Cash($mysqli);
$video = new Video($mysqli);
$member = new Member($mysqli);

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $memberData = $member->checkToken($token);
}

if (!isset($memberData)) {
    echo json_encode(false);
    exit;
}

if (!isset($_POST)) {
    echo json_encode(false);
    exit;
}

$request = $_POST;

switch ($request['todo']) {
    case 'deposit':
        $return = $cash->deposit($request['moneyId'], $memberData);
        echo json_encode($return);
        break;
    case 'buyVideo':
        $num = $video->videoCheck($request['videoId']);

        if ($num['success'] !== true) {
            $return = [
                'error_code' => 'off',
                'success' => false
            ];
            echo json_encode($return);
            break;
        }
        $videoData = $video->getEpData($request['videoId']);
        $return = $cash->debit($request['videoId'], $memberData, $videoData['price']);
        echo json_encode($return);
        break;
    default:
        $return = [
            'error_code' => 1,
            'success' => false
        ];
        echo json_encode($return);
        break;
}

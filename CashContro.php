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

switch ($_POST['todo']) {
    case 'deposit':
        $moneyId = $_POST['moneyId'];
        $return = $cash->deposit($moneyId, $token);
        echo json_encode($return);
        break;
    case 'buyVideo':
        $videoId = $_POST['videoId'];
        $num = $video->videoCheck($videoId);
        if ($num['success'] === true) {
            $videoData = $video->getEpData($videoId);
            $return = $cash->buyVideo($videoId, $token, $videoData['price']);
        } else {
            $return = [
                'error' => 'off',
                'success' => false
            ];
        }
        echo json_encode($return);
        break;
    default:
        echo json_encode(false);
        break;
}

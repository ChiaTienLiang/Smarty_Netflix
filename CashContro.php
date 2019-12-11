<?php
require_once './backend/sql.php';
require_once './class/CashClass.php';
require_once './class/VideoClass.php';

$cash = new Cash($mysqli);
$video = new Video($mysqli);
$token =  $_COOKIE['token'];

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
            $videoData = $video->getPrice($videoId);
            $return = $cash->buyVideo($videoId, $token, $videoData['price']);
            echo json_encode($return);
        } else echo json_encode(false);
        break;
    default:
        echo json_encode(false);
        break;
}

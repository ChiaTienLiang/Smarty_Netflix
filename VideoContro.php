<?php
require_once './class/VideoClass.php';
require_once './class/MemberClass.php';
require_once 'backend/sql.php';

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

if (isset($_FILES)) {
    $files = $_FILES;
}

switch ($request['todo']) {
    case 'videoLink':
        $id = $request['id'];
        $return = $video->videoCheck($id);
        echo json_encode($return);
        break;
    case 'uploadEp':
        $return = $video->uploadEp($files['file'], $request['epName'], $request['videoId'], $request['price']);
        echo json_encode($return);
        break;
    case 'onShelf':
        $return = $video->onShelf($request['videoId']);
        echo json_encode($return);
        break;
    case 'offShelf':
        $return = $video->offShelf($request['videoId']);
        echo json_encode($return);
        break;
    case 'newVideo':
        $return = $video->newVideo($request['name'], $request['des'], $request['img1'], $request['img2']);
        echo json_encode($return);
        break;
    case 'editVideo':
        $return = $video->editVideo($request['id'], $request['name'], $request['des'], $request['img1'], $request['img2']);
        echo json_encode($return);
        break;
    case 'editEp':
        $return = $video->editEp($files['file'], $request['epName'], $request['id'], $request['price']);
        echo json_encode($return);
        break;
    case 'editEp_nofile':
        $return = $video->editEp_nofile($request['epName'], $request['id'], $request['price']);
        echo json_encode($return);
        break;
    default:
        echo json_encode(false);
        break;
}

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


if (isset($memberData)) {
    echo json_encode(false);
    exit;
}

if (isset($_POST['todo'])) {
    switch ($_POST['todo']) {
        case 'videoLink':
            $id = $_POST['id'];
            $return = $video->videoCheck($id);
            echo json_encode($return);
            break;
        case 'uploadEp':
            $test = $_FILES["file"]["type"];
            $file = $_FILES['file'];
            $epName = $_POST['epName'];
            $videoId = $_POST['videoId'];
            $price = $_POST['price'];
            $return = $video->uploadEp($file, $epName, $videoId, $price);
            echo json_encode($return);
            break;
        case 'onShelf':
            $videoId = $_POST['videoId'];
            $return = $video->onShelf($videoId);
            echo json_encode($return);
            break;
        case 'offShelf':
            $videoId = $_POST['videoId'];
            $return = $video->offShelf($videoId);
            echo json_encode($return);
            break;
        case 'newVideo':
            $name = $_POST['name'];
            $des = $_POST['des'];
            $img1 = $_POST['img1'];
            $img2 = $_POST['img2'];
            $return = $video->newVideo($name, $des, $img1, $img2);
            echo json_encode($return);
            break;
        case 'editVideo':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $des = $_POST['des'];
            $img1 = $_POST['img1'];
            $img2 = $_POST['img2'];
            $return = $video->editVideo($id, $name, $des, $img1, $img2);
            echo json_encode($return);
            break;
        case 'editEp':
            $test = $_FILES["file"]["type"];
            $file = $_FILES['file'];
            $epName = $_POST['epName'];
            $id = $_POST['id'];
            $price = $_POST['price'];
            $return = $video->editEp($file, $epName, $id, $price);
            echo json_encode($return);
            break;
        case 'editEp_nofile':
            $epName = $_POST['epName'];
            $id = $_POST['id'];
            $price = $_POST['price'];
            $return = $video->editEp_nofile($epName, $id, $price);
            echo json_encode($return);
            break;
        default:
            echo json_encode(false);
            break;
    }
} elseif (isset($_GET['todo'])) {
    switch ($_GET['todo']) {
        case 'getOneEp':
            $id = $_POST['id'];
            $return = $video->getEpData($id);
            echo json_encode($return);
            break;
        case 'getOneVideo':
            $id = $_POST['id'];
            $return = $video->singalVideo($id);
            echo json_encode($return);
            break;
        default:
            echo json_encode(false);
            break;
    }
}

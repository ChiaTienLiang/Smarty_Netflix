<?php
require_once './class/MemberClass.php';
require_once 'backend/sql.php';
$member = new Member($mysqli);
$emailR = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/';
$passwordR = '/^[a-zA-Z0-9]{8,12}$/';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!preg_match($emailR, $email) || !preg_match($passwordR, $password)) { ## 是否符合正規
        $return = [
            'error_code' => 29,
            'success' => false,
            'data' => null
        ];
        echo json_encode($return);
        exit;
    }
}
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $memberData = $member->checkToken($token);
    if (!isset($memberData)) {
        $return = [
            'error_code' => 30,
            'success' => false,
            'data' => null
        ];
        echo json_encode($return);
        exit;
    }
}

if (!isset($_POST)) {
    $return = [
        'error_code' => 31,
        'success' => false,
        'data' => null
    ];
    echo json_encode($return);
    exit;
}

$request = $_POST;

switch ($request['todo']) {
    case 'login':
        $return = $member->login($email, $password);
        echo json_encode($return);
        break;
    case 'logout':
        $return = $member->logout($memberData->id);
        echo json_encode($return);
        break;
    case 'signUp':
        if (isset($request['name'])) {
            $name = $request['name'];
            $password = password_hash($password, PASSWORD_DEFAULT); ## hash加密
            $return =  $member->signUp($name, $email, $password);
            echo json_encode($return);
        } else {
            $return = [
                'error_code' => 32,
                'success' => false,
                'data' => null
            ];
            echo json_encode($return);
        }
        break;
    case 'stopPms':
        $memberId = $request['memberId'];
        $return =  $member->stopPms($memberId);
        echo json_encode($return);
        break;
    case 'restore':
        $memberId = $request['memberId'];
        $return =  $member->restore($memberId);
        echo json_encode($return);
        break;
    default:
        $return = [
            'error_code' => 33,
            'success' => false,
            'data' => null
        ];
        echo json_encode($return);
        break;
}

<?php
require_once './class/MemberClass.php';
require_once 'backend/sql.php';
$member = new Member($mysqli);
$emailR = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/';
$passwordR = '/^[a-zA-Z0-9]{8,12}$/';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!preg_match($emailR, $email) || !preg_match($passwordR, $password)) { //是否符合正規
        echo json_encode(false);
        exit;
    }
}

switch ($_POST['todo']) {
    case 'login':
        $return = $member->login($email, $password);
        echo json_encode($return);
        break;
    case 'logout':
        $return = $member->logout();
        echo json_encode($return);
        break;
    case 'signUp':
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $password = password_hash($password, PASSWORD_DEFAULT); //hash加密
            $return =  $member->signUp($name, $email, $password);
            echo json_encode($return);
        } else echo json_encode(false);
        break;
    default:
        echo json_encode(false);
        break;
}

<?php
require_once './backend/sql.php';
require_once './class/MsgClass.php';

$getMsg = new Msg($mysqli);

switch ($_POST['todo']) {
    // case 'addMsg':
    //     $Msg = $_POST['Msg'];
    //     $token = $_POST['key'];
    //     $return = $getMsg->addMsg($Msg, $token);
    //     echo json_encode($return);
    //     break;
    // case 'changMsg':
    //     $Msg = $_POST['Msg'];
    //     $id = $_POST['id'];
    //     $token = $_POST['key'];
    //     $return = $getMsg->changMsg($Msg, $id, $token);
    //     echo json_encode($return);
    //     break;
    // case 'delMsg':
    //     $id = $_POST['id'];
    //     $token = $_POST['key'];
    //     $return = $getMsg->delMsg($id, $token);
    //     echo json_encode($return);
    //     break;
    default:
        echo json_encode(false);
        break;
}

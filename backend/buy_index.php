<?php

/**
 * Example Application
 *
 * @package Example-application
 */
require_once '../libs/Smarty.class.php';
require_once 'sql.php';
require_once '../class/CashClass.php';
$smarty = new Smarty;
$smarty->debugging = true;
$Cash = new Cash($mysqli);

/*
 **撈金額資料
 */
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $member = $Cash->checkToken($token);
    $cashList = $Cash->list();

    $smarty->assign("money", $cashList);

    $smarty->display('../templates/buy.html');
} else header('Location:home_index.php');

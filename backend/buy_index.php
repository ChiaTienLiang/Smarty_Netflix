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
    $smarty->assign("memberName", $member->name);
    $smarty->assign("memberId", $member->id);
    $smarty->assign("memberLevel", $member->level);
    $smarty->assign("memberWallet", $member->wallet);

    $cashList = $Cash->list();
    $smarty->assign("money", $cashList);
    $smarty->display('../templates/buy.html');
} else header('Location:home_index.php');

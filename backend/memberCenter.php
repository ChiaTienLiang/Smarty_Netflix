<?php

/**
 * Example Application
 *
 * @package Example-application
 */
require_once '../libs/Smarty.class.php';
require_once 'sql.php';
require_once '../class/MemberClass.php';
require_once '../class/VideoClass.php';
require_once '../class/CashClass.php';

$smarty = new Smarty;
$smarty->debugging = true;
//$smarty->force_compile = true;
// $smarty->caching = true;
// $smarty->cache_lifetime = 120;

$Member = new Member($mysqli);
$Video = new Video($mysqli);
$Cash = new Cash($mysqli);

/**
 * 撈登入資料
 */
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $memberData = $Member->checkToken($token);
    if ($memberData->permission === 1) {
        $memberDeposit = $Cash->memberDeposit($memberData->id);

        $smarty->assign("memberDeposit", $memberDeposit);
        $smarty->assign("memberName", $memberData->name);
        $smarty->assign("memberId", $memberData->id);
        $smarty->assign("memberLevel", $memberData->level);
        $smarty->assign("memberWallet", $memberData->wallet);
        $smarty->display('../templates/memberCenter.html');
    } else header('Location:home_index.php');
} else header('Location:home_index.php');

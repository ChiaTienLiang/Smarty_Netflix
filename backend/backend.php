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

$smarty = new Smarty;
$smarty->debugging = true;
//$smarty->force_compile = true;
// $smarty->caching = true;
// $smarty->cache_lifetime = 120;

$Member = new Member($mysqli);
$Video = new Video($mysqli);
/**
 * 撈登入資料
 */
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $memberData = $Member->checkToken($token);
    if ($memberData->level === 1) {
        $allMember = $Member->allMember();
        $allVideo = $Video->admin_allVideo();
        $smarty->assign("allMember", $allMember);
        $smarty->assign("memberName", $memberData->name);
        $smarty->assign("memberId", $memberData->id);
        $smarty->assign("memberLevel", $memberData->level);
        $smarty->assign("memberWallet", $memberData->wallet);
        $smarty->assign("allVideo", $allVideo);
    } else header('Location:home_index.php');
} else header('Location:home_index.php');

$smarty->display('../templates/backend.html');

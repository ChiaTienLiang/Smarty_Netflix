<?php

/**
 * Example Application
 *
 * @package Example-application
 */
require_once '../libs/Smarty.class.php';
require_once 'sql.php';
require_once '../class/VideoClass.php';

$smarty = new Smarty;
$smarty->debugging = true;

$Video = new Video($mysqli);

/*
 **撈全部影片資料
 */
$search = $Video->allVideo();
if ($search != null) {
    $num = ceil(count($search) / 4);
    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ((4 * $i + $j) < count($search))
                $newSearch[$i][$j] = $search[4 * $i + $j];
        }
    }
} else $newSearch = null;

$smarty->assign("res", $newSearch);

/**
 * 撈登入資料
 */

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $member = $Video->checkToken($token);
}

if (isset($member)) {
    $smarty->assign("memberName", $member->name);
    $smarty->assign("memberId", $member->id);
    $smarty->assign("memberLevel", $member->level);
    $smarty->assign("memberWallet", $member->wallet);
} else {
    $smarty->assign("memberName", "Guest");
    $smarty->assign("memberLevel", null);
}

$smarty->display('../templates/home.html');

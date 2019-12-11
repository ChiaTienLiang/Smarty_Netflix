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

// var_dump($_SERVER['SERVER_PROTOCOL']);
// exit;
/**
 * 撈登入資料
 */
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $memberData = $Member->checkToken($token);
    if ($memberData->level === 1) {
        $allMember = $Member->allMember();
        $allVideo = $Video->admin_allVideo();
        $test = $Video->allEpisodes();

        $num = Count($test);
        for ($i = 0; $i < $num; $i++) {
            $ep_array[$i] = explode("&emsp;", $test[$i]['episode']);
            $test[$i]['episode'] = $ep_array[$i][1];
            $no[$i] = substr($ep_array[$i][0], 3, -3);
            $test[$i]['no'] = $no[$i];
            $j = $test[$i]['videoId'];
            $array_test[$j][] = $test[$i];
        }
        
        $smarty->assign("test", $array_test);
        $smarty->assign("allMember", $allMember);
        $smarty->assign("memberName", $memberData->name);
        $smarty->assign("memberId", $memberData->id);
        $smarty->assign("memberLevel", $memberData->level);
        $smarty->assign("memberWallet", $memberData->wallet);
        $smarty->assign("allVideo", $allVideo);
    } else header('Location:home_index.php');
} else header('Location:home_index.php');

$smarty->display('../templates/backend.html');

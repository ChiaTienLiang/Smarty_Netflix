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

/**
 * 判斷是否有登入(token)，無則轉至首頁
 */
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $member = $Video->checkToken($token);
    $smarty->assign("memberName", $member->name);
    $smarty->assign("memberId", $member->id);
    $smarty->assign("memberLevel", $member->level);
    $smarty->assign("memberWallet", $member->wallet);

    $total = $Video->countVideo();
    if (isset($_GET['id'])) {
        $videoId = (int) $_GET['id'];
        if (0 < $videoId && $videoId <= $total)
            $videoId = $videoId;
        else $videoId = 1;
    } else $videoId = 1;

    $videoData = $Video->singalVideo($videoId);
    $episodes = $Video->episodeList($member->id, $videoId);
    // $episodes = $Video->getEpisodes($videoId);
    // $shopHistory = $Video->shopHistory($member->id, $videoId);

    $smarty->assign("videoName", $videoData->name);
    $smarty->assign("videoDes", $videoData->descript);
    $smarty->assign("videoImg1", $videoData->img1);
    $smarty->assign("videoImg2", $videoData->img2);
    $smarty->assign("episodes", $episodes);

    $smarty->display('../templates/videoPage.html');
} else {
    header('Location:home_index.php');
    exit;
}

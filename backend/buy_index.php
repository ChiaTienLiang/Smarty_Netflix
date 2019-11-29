<?php

/**
 * Example Application
 *
 * @package Example-application
 */
require_once '../libs/Smarty.class.php';
require_once 'sql.php';
$smarty = new Smarty;
//$smarty->force_compile = true;
$smarty->debugging = true;
// $smarty->caching = true;
// $smarty->cache_lifetime = 120;

/*
 **撈金額資料
 */
$sql = "SELECT * FROM moneycategory ";
$result = mysqli_query($mysqli, $sql);
$num = mysqli_num_rows($result); //取得數量
for ($i = 0; $i < $num; $i++) {
    $search[$i] = mysqli_fetch_assoc($result);
}
$smarty->assign("money", $search);

$smarty->display('../templates/buy.html');

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
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page < 0) $page = 0 - $page;
}
/*
 **撈資料
 */
// $sql = "SELECT * FROM videos WHERE id = ?";


// $result = mysqli_query($mysqli, $sql);
// $num = mysqli_num_rows($result); //取得數量
// $num = ceil($num / 4);
// for ($i = 0; $i < $num; $i++) {
//     for ($j = 0; $j < 4; $j++) {
//         $search[$i][$j] = mysqli_fetch_assoc($result);
//     }
// }
// $smarty->assign("res", $search);

$smarty->display('../templates/videoPage.html');

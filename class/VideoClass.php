<?php
require_once 'tokenClass.php';
/**
 * 影片相關
 */
class Video extends Token
{
    // private $mysqli;

    // function __construct($mysqli)
    // {
    //     $this->mysqli = $mysqli;
    // }

    /**
     * 撈全部影片資料
     */
    public function allVideo()
    {
        $sql = "SELECT * FROM videos ";
        $result = mysqli_query($this->mysqli, $sql);
        $num = mysqli_num_rows($result); //取得數量
        $num = ceil($num / 4);
        for ($i = 0; $i < $num; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $search[$i][$j] = mysqli_fetch_assoc($result);
            }
        }
        mysqli_free_result($result);
        return $search;
    }


    /**
     * 計算影片總數
     */
    public function countVideo()
    {
        $sql = "SELECT COUNT(*) as total FROM videos";
        $result = mysqli_query($this->mysqli, $sql);
        $count = mysqli_fetch_assoc($result);
        return $count['total'];
    }

    /**
     * 撈單筆影片資料
     */
    public function singalVideo($id)
    {
        $sql = "SELECT * FROM videos WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $videoData = $result->fetch_object();
        return $videoData;
    }

    /**
     * 撈單影片所有集數資料
     */
    public function getEpisodes($id)
    {
        $sql = "SELECT * FROM episodes WHERE videoId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        for ($i = 0; $i < $num; $i++) {
            $episodes[$i] = $result->fetch_assoc();
        }
        return $episodes;
    }


    /**
     * 撈單一集數價錢
     */
    public function getPrice($id)
    {
        $sql = "SELECT price FROM episodes WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $price = $result->fetch_assoc();
        return $price;
    }


    /**
     * 比對購買紀錄
     */
    public function shopHistory($memberId, $videoId)
    {
        $sql = "SELECT shopping.episodeId  FROM shopping,episodes WHERE shopping.episodeId = episodes.id AND shopping.memberId = ? AND episodes.videoId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ii', $memberId, $videoId);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num > 1) {
            for ($i = 0; $i < $num; $i++) {
                $shopHistory[$i] = $result->fetch_assoc();
            }
        } else {
            $shopHistory = $result->fetch_assoc();
        }
        return $shopHistory;
    }

    public function episodeList($memberId, $videoId)
    {
        $episodes = $this->getEpisodes($videoId);

        $shopHistory = $this->shopHistory($memberId, $videoId);
        // var_dump($shopHistory);
        // exit;
        $epTotal = count($episodes);
        if (isset($shopHistory)) {
            $shopTotal = count($shopHistory);
            if ($shopTotal === 1) {
                for ($i = 0; $i < $epTotal; $i++) {
                    if ($episodes[$i]['id'] === $shopHistory['episodeId']) {
                        $shop[$i]['isbuy'] = true;
                        $shop[$i]['id'] = $episodes[$i]['id'];
                        $shop[$i]['episode'] = $episodes[$i]['episode'];
                        $shop[$i]['url'] = $episodes[$i]['url'];
                        $shop[$i]['price'] = $episodes[$i]['price'];
                    } else {
                        $shop[$i]['isbuy'] = false;
                        $shop[$i]['id'] = $episodes[$i]['id'];
                        $shop[$i]['episode'] = $episodes[$i]['episode'];
                        $shop[$i]['url'] = $episodes[$i]['url'];
                        $shop[$i]['price'] = $episodes[$i]['price'];
                    }
                }
            } else {
                for ($i = 0; $i < $epTotal; $i++) {
                    for ($j = 0; $j < $shopTotal; $j++) {
                        if ($episodes[$i]['id'] === $shopHistory[$j]['episodeId']) {
                            $shop[$i]['isbuy'] = true;
                            $shop[$i]['id'] = $episodes[$i]['id'];
                            $shop[$i]['episode'] = $episodes[$i]['episode'];
                            $shop[$i]['url'] = $episodes[$i]['url'];
                            $shop[$i]['price'] = $episodes[$i]['price'];
                            break;
                        } else {
                            $shop[$i]['isbuy'] = false;
                            $shop[$i]['id'] = $episodes[$i]['id'];
                            $shop[$i]['episode'] = $episodes[$i]['episode'];
                            $shop[$i]['url'] = $episodes[$i]['url'];
                            $shop[$i]['price'] = $episodes[$i]['price'];
                        }
                    }
                }
            }
        } else {
            for ($i = 0; $i < $epTotal; $i++) {
                $shop[$i]['isbuy'] = false;
                $shop[$i]['id'] = $episodes[$i]['id'];
                $shop[$i]['episode'] = $episodes[$i]['episode'];
                $shop[$i]['url'] = $episodes[$i]['url'];
                $shop[$i]['price'] = $episodes[$i]['price'];
            }
        }
        return $shop;
    }
}

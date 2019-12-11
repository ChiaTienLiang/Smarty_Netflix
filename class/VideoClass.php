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
     * 確認影片狀態(上下架)
     */
    public function videoCheck($id)
    {
        $sql = "SELECT COUNT(*) AS num FROM episodes,videos WHERE videos.id=episodes.videoId AND videos.upload = 1 AND episodes.id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $videoData = mysqli_fetch_assoc($result);
        if ($videoData['num'] > 0) {
            $return = [
                'error' => null,
                'success' => true
            ];
        } else {
            $return = [
                'error' => 'off',
                'success' => false
            ];
        }
        return $return;
    }

    /**
     * 撈全部影片資料(一般使用者)
     */
    public function allVideo()
    {
        $sql = "SELECT * FROM videos WHERE upload = 1";
        $result = mysqli_query($this->mysqli, $sql);
        $num = mysqli_num_rows($result); ## 取得數量
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $search[$i] = mysqli_fetch_assoc($result);
            }
        } else $search = null;
        return $search;
    }

    /**
     * 撈全部影片資料(管理者)
     */
    public function admin_allVideo()
    {
        $sql = "SELECT * FROM videos";
        $result = mysqli_query($this->mysqli, $sql);
        $num = mysqli_num_rows($result); //取得數量
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $search[$i] = mysqli_fetch_assoc($result);
            }
        } else $search = null;
        return $search;
    }


    /**
     * 計算影片總數
     */
    public function countVideo()
    {
        $sql = "SELECT COUNT(*) as total FROM videos WHERE upload = 1";
        $result = mysqli_query($this->mysqli, $sql);
        $count = mysqli_fetch_assoc($result);
        return $count['total'];
    }

    /**
     * 撈單筆影片資料
     */
    public function singalVideo($id)
    {
        $sql = "SELECT * FROM videos WHERE id = ? AND upload = 1";
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
        $sql = "SELECT * FROM episodes WHERE videoId = ? ";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $episodes[$i] = $result->fetch_assoc();
            }
            return $episodes;
        } else return $result->fetch_assoc();
    }

    /**
     * 撈全部影片所有集數資料(管理者)
     */
    public function allEpisodes()
    {
        $sql = "SELECT episodes.episode,episodes.id,episodes.price,episodes.id,episodes.videoId,videos.name FROM episodes,videos WHERE episodes.videoId=videos.id";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $episodes[$i] = $result->fetch_assoc();
            }
            return $episodes;
        } else return $result->fetch_assoc();
    }

    /**
     * 撈單一集數資料
     */
    public function getEpData($id)
    {
        $sql = "SELECT * FROM episodes WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
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

    /**
     * 所有集數資訊及是否購買
     */
    public function episodeList($memberId, $videoId)
    {
        $episodes = $this->getEpisodes($videoId);
        if ($episodes != null) {
            $shopHistory = $this->shopHistory($memberId, $videoId);
            $epTotal = count($episodes);
            if (isset($shopHistory)) {
                $shopTotal = count($shopHistory);
                if ($shopTotal === 1) {
                    for ($i = 0; $i < $epTotal; $i++) {
                        if ($episodes[$i]['id'] === $shopHistory['episodeId']) {
                            $shop[$i]['isbuy'] = true;
                        } else {
                            $shop[$i]['isbuy'] = false;
                        }
                        $shop[$i]['id'] = $episodes[$i]['id'];
                        $shop[$i]['episode'] = $episodes[$i]['episode'];
                        $shop[$i]['url'] = $episodes[$i]['url'];
                        $shop[$i]['price'] = $episodes[$i]['price'];
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

    /**
     * 下架影片
     */
    public function offShelf($id)
    {
        $sql = "UPDATE videos SET upload = 0 WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $return =  $stmt->execute();
        return $return;
    }

    /**
     * 上架影片
     */
    public function onShelf($id)
    {
        $sql = "UPDATE videos SET upload = 1 WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i',  $id);
        $return =  $stmt->execute();
        return $return;
    }

    /**
     * 新增影集資訊
     */
    public function newVideo($name, $des, $img1, $img2)
    {
        $name = str_replace("<", "&lt;", $name);
        $des = str_replace("<", "&lt;", $des);
        $sql = "INSERT INTO videos(`name`, `descript`, `img1`, `img2`)" . "VALUES(?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssss", $name, $des, $img1, $img2);
        $return = $stmt->execute();
        return $return;
    }

    /**
     * 新增分集
     */
    public function uploadEp($file, $epName, $videoId, $price)
    {
        $epName = str_replace("<", "&lt;", $epName);
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid(date('YmdHis'), true) . '.' . $fileExt;
        $filePath = 'video/' . $newName;
        $uploadSuccess = move_uploaded_file($file['tmp_name'], $filePath);
        if ($uploadSuccess === true) {
            $sql = "INSERT INTO episodes(`episode`, `videoId`, `url`, `price`)" . "VALUES(?, ?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("sisi", $epName, $videoId, $newName, $price);
            $return = $stmt->execute();
            return $return;
        } else return $uploadSuccess;
    }

    /**
     * 影片購買紀錄清單
     */
    public function shopingList($memberId)
    {
        $sql = "SELECT episodes.id,videos.name,episodes.episode,episodes.url,shopping.create_at,videos.upload FROM shopping,episodes,videos WHERE shopping.episodeId = episodes.id AND episodes.videoId = videos.id AND shopping.memberId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $memberId);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num > 1) {
            for ($i = 0; $i < $num; $i++) {
                $shopingList[$i] = $result->fetch_assoc();
            }
        } else {
            $shopingList = $result->fetch_assoc();
        }
        return $shopingList;
    }

    /**
     * 修改影片資訊
     */
    public function editVideo($id, $name, $des, $img1, $img2)
    {
        $name = str_replace("<", "&lt;", $name);
        $des = str_replace("<", "&lt;", $des);
        $sql = "UPDATE videos SET name = ?, descript = ?, img1 = ?, img2 = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssssi", $name, $des, $img1, $img2, $id);
        $return = $stmt->execute();
        return $return;
    }

    /**
     * 修改分集資訊(含影片)
     * @param objcet $file 圖片資料
     */
    public function editEp($file, $epName, $id, $price)
    {
        $epName = str_replace("<", "&lt;", $epName);
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid(date('YmdHis'), true) . '.' . $fileExt;
        $filePath = 'video/' . $newName;
        $uploadSuccess = move_uploaded_file($file['tmp_name'], $filePath);

        if ($uploadSuccess !== true) {
            return false;
        }

        $sql = "UPDATE episodes SET episode = ?, url = ?, price = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssii", $epName, $newName, $price, $id);
        return $stmt->execute();
    }

    /**
     * 修改分集資訊(不含影片)
     */
    public function editEp_nofile($epName, $id, $price)
    {
        $epName = str_replace("<", "&lt;", $epName);
        $sql = "UPDATE episodes SET episode = ?, price = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("sii", $epName, $price, $id);
        $return = $stmt->execute();
        return $return;
    }
}

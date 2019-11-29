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
     * 撈全部資料
     */
    function allVideo()
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
     * 撈單筆資料
     */
    function singalVideo()
    {

        // $sql = "SELECT * FROM member Where email = ?"; //確認是否有該email
        // $stmt = $this->mysqli->prepare($sql);
        // $stmt->bind_param('s', $email);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // if ($result->num_rows === 0) {  //email不存在
        //     mysqli_free_result($result);
        //     mysqli_close($this->mysqli);
        //     return false;
        // } else {
        //     $memberData = $result->fetch_object();
        //     $pwd = $memberData->password;
        //     $test = password_verify($password, $pwd); //hash比對
        //     if ($test === true) {
        //         $key = 'PID_Tien' . rand(1, 10000);
        //         $secret = [
        //             'id' => $memberData->id,
        //             'username' => $memberData->name,
        //             'level' => $memberData->level,
        //         ];
        //         $secret = json_encode($secret);
        //         $token = hash_hmac('sha256', "$secret", $key, false);
        //         $sql = "UPDATE member SET token = ? WHERE id = ?";
        //         $stmt = $this->mysqli->prepare($sql);
        //         $stmt->bind_param('si', $token, $memberData->id);
        //         $stmt->execute();
        //         $this->name = $memberData->name;
        //         $this->memberId = $memberData->id;
        //         $this->level = $memberData->level;

        //         $_SESSION['name'] = $memberData->name;
        //         $_SESSION['level'] = $memberData->level;
        //         $_SESSION['memberId'] = $memberData->id;
        //         mysqli_close($this->mysqli);
        //         mysqli_free_result($result);
        //         $return = [
        //             'token' => $token,
        //             'success' => true
        //         ];
        //         return $return;
        //     } else {
        //         mysqli_free_result($result);
        //         mysqli_close($this->mysqli);
        //         return false;
        //     }
        // }
    }
}

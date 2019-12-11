<?php
require_once 'tokenClass.php';
/**
 * 會員相關
 */
class Member extends Token
{
    // private $mysqli;

    // function __construct($mysqli)
    // {
    //     session_start();
    //     $this->mysqli = $mysqli;
    // }

    /**
     * 註冊
     */
    function signUp($name, $email, $password)
    {
        $sql = "SELECT * FROM member Where email = ?"; //確認email是否已被註冊
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $sql = "INSERT INTO member(name,email,password)VALUES(?,?,?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('sss', $name, $email, $password);
            $return = $stmt->execute();
        } else $return = false;
        mysqli_free_result($result);
        mysqli_close($this->mysqli);
        return $return;
    }

    /**
     * 登入
     */
    function login($email, $password)
    {
        $sql = "SELECT * FROM member Where email = ?"; //確認是否有該email
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {  //email不存在
            mysqli_free_result($result);
            mysqli_close($this->mysqli);
            $return = [
                'error' => 'mail',
                'success' => false
            ];
            return $return;
        } else {
            $memberData = $result->fetch_object();
            $pwd = $memberData->password;
            $test = password_verify($password, $pwd); //hash比對
            if ($test === true && $memberData->permission === 1) {
                $key = 'PID_Tien' . rand(1, 10000);
                $secret = [
                    'id' => $memberData->id,
                    'username' => $memberData->name,
                    'level' => $memberData->level,
                ];
                $secret = json_encode($secret);
                $token = hash_hmac('sha256', $secret, $key, false);
                $sql = "UPDATE member SET token = ? WHERE id = ?";
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param('si', $token, $memberData->id);
                $return = $stmt->execute();
                if ($return) {
                    $this->name = $memberData->name;
                    $this->memberId = $memberData->id;
                    $this->level = $memberData->level;
                    setcookie("token", $token, time() + 3600 * 24, "/");
                    $return = [
                        'error' => null,
                        'success' => true
                    ];
                } else {
                    $return = [
                        'error' => null,
                        'success' => false
                    ];
                }
            } else {
                $return = [
                    'error' => 'permission',
                    'success' => false
                ];
            }
            return $return;
        }
    }

    /**
     * 登出
     */
    function logout($id)
    {
        setcookie("token", "", time() - 3600 * 24, "/");
        $sql = "UPDATE member SET token = null WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $return =  $stmt->execute();
        return $return;
    }

    /**
     * 列出所有會員資料
     */
    public function allMember()
    {
        $sql = "SELECT name,email,id,permission FROM member WHERE level = 0";
        $result = mysqli_query($this->mysqli, $sql);
        $num = mysqli_num_rows($result); //取得數量
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $search[$i] = mysqli_fetch_assoc($result);
            }
        } else $search = null;
        mysqli_free_result($result);
        return $search;
    }

    /**
     * 停權會員
     */
    public function stopPms($id)
    {
        $sql = "UPDATE member SET permission = 0 , token = null WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $return =  $stmt->execute();
        return $return;
    }

    /**
     * 恢復會員
     */
    public function restore($id)
    {
        $sql = "UPDATE member SET permission = 1 WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i',  $id);
        $return =  $stmt->execute();
        return $return;
    }
}

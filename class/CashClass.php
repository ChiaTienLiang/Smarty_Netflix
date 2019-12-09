<?php
require_once 'TokenClass.php';

/**
 * 金錢相關
 */
class Cash extends Token
{
    // private $mysqli;

    // function __construct($mysqli)
    // {
    //     $this->mysqli = $mysqli;
    // }

    /**
     * 儲值清單
     */
    public function list()
    {
        $sql = "SELECT * FROM moneycategory ";
        $stmt =  $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        for ($i = 0; $i < $num; $i++) {
            $search[$i] = mysqli_fetch_assoc($result);
        }
        mysqli_close($this->mysqli);
        return $search;
    }

    /**
     * 比對儲值金額ID
     */
    public function wallet($moneyId)
    {
        $sql = "SELECT * FROM moneycategory WHERE id = ? ";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $moneyId);
        $stmt->execute();
        $result = $stmt->get_result();
        $money = $result->fetch_object();
        return $money;
    }

    /**
     * 儲值
     */
    public function deposit($moneyId, $token)
    {
        $memberData = Token::checkToken($token);
        $money = $this->wallet($moneyId);

        ## 新增儲值紀錄
        $sql = "INSERT INTO deposit(memberId,price,point,create_at)VALUES(?,?,?,?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iiis', $memberData->id, $money->price, $money->point, $this->date);
        $stmt->execute();
        $total = $memberData->wallet + $money->point;
        $return = $this->updateWallet($total, $memberData->id);
        return $return;
    }

    /**
     * 更新會員錢包的金額
     */
    public function updateWallet($total, $memberId)
    {
        $sql = "UPDATE member SET wallet = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ii', $total, $memberId);
        $return = $stmt->execute();
        mysqli_close($this->mysqli);
        return $return;
    }

    /**
     * 購買影片
     */
    public function buyVideo($viedoId, $token, $price)
    {
        $memberData = Token::checkToken($token);

        ## 新增購買紀錄
        $sql = "INSERT INTO shopping(memberId,episodeId,cost,create_at)VALUES(?,?,?,?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iiis', $memberData->id, $viedoId, $price, $this->date);
        $stmt->execute();

        ## 錢包扣款
        $total = $memberData->wallet - $price;
        $return = $this->updateWallet($total, $memberData->id);
        return $return;
    }

    /**
     * 該會員的儲值紀錄
     */
    public function memberDeposit($memberId)
    {
        $sql = "SELECT * FROM deposit WHERE memberId = ? ";
        $stmt =  $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $memberId);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $search[$i] = mysqli_fetch_assoc($result);
            }
        } else {
            $search = null;
        }
        return $search;
    }
}

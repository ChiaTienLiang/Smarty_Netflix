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

        if ($num === 0) {
            $result = null;
            return $result;
        }

        for ($i = 0; $i < $num; $i++) {
            $search[$i] = mysqli_fetch_assoc($result);
        }
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
        $return = $stmt->execute();
        if ($return !== true) {
            return $return;
        }
        $result = $stmt->get_result();
        $money = $result->fetch_object();
        return $money;
    }

    /**
     * 儲值
     */
    public function deposit($moneyId, $memberData)
    {
        $money = $this->wallet($moneyId);

        ## 新增儲值紀錄
        $sql = "INSERT INTO deposit(memberId,price,point,create_at)VALUES(?,?,?,?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iiis', $memberData->id, $money->price, $money->point, $this->date);
        $return = $stmt->execute();
        if ($return !== true) {
            $return = [
                'error_code' => 19,
                'success' => false,
                'data' => null
            ];
            return $return;
        }
        $total = $memberData->wallet + $money->point;
        $return = $this->updateWallet($total, $memberData->id);
        if ($return !== true) {
            $return = [
                'error_code' => 20,
                'success' => false,
                'data' => null
            ];
            return $return;
        }

        $return = [
            'error_code' => null,
            'success' => true,
            'data' => null
        ];
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
        return $stmt->execute();
    }

    /**
     * 購買影片(扣款)
     */
    public function debit($viedoId, $memberData, $price)
    {
        ## 新增購買紀錄
        $sql = "INSERT INTO shopping(memberId, episodeId, cost, create_at) VALUES (?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iiis',  $memberData->id, $viedoId, $price, $this->date);
        $return = $stmt->execute();
        if ($return !== true) {
            $return = [
                'error_code' => 21,
                'success' => false,
                'data' => null
            ];
            return $return;
        }

        ## 錢包扣款
        $total = $memberData->wallet - $price;
        $debitSuccess = $this->updateWallet($total, $memberData->id);
        if ($debitSuccess !== true) {
            $return = [
                'error_code' => 22,
                'success' => false,
                'data' => null
            ];
            return $return;
        }

        $return = [
            'error' => null,
            'success' => true,
            'data' => null
        ];
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
        if ($num === 0) {
            $search = null;
            return $search;
        }
        for ($i = 0; $i < $num; $i++) {
            $search[$i] = mysqli_fetch_assoc($result);
        }
        return $search;
    }
}

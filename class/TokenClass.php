<?php

/**
 * 處理前端token
 */
class Token
{
    protected $mysqli;
    public $date;
    public function __construct($mysqli)
    {
        date_default_timezone_set("Asia/Taipei");
        $this->mysqli = $mysqli;
        $this->date =  date("Y-m-d H:i:s");
    }
    public function checkToken($token)
    {
        $sql = "SELECT * FROM member Where token= ?"; //確認該token是否存在
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $memberData = $result->fetch_object();
        return $memberData;
    }
}

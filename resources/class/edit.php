<?php
class edit extends config{
  public $cid;

  public function __construct($cid){
    $this->cid = $cid;
  }

  public function updateTransact(){
    date_default_timezone_set('Asia/Hong_Kong');
    $outTime = date("Y-m-d H:i:s");
    $con = $this->con();
    $sql = "UPDATE `transaction_tbl` SET `out_time`= '$outTime', `transact_status`='COMPLETED' WHERE `card_id` = '$this->cid' AND `transact_status` = 'PENDING'";
    $data =$con->prepare($sql);
    if($data->execute()){
    return true;
    }else {
    return false;
    }
  }

  public function updateUser(){
    date_default_timezone_set('Asia/Hong_Kong');
    $now = date('Y-m-d');
    $start_date = strtotime($now);
    $end_date = strtotime("+14 day", $start_date);
    date_default_timezone_set('Asia/Hong_Kong');
    $fdate = date('Y-m-d', $end_date);
    $con = $this->con();
    $sql = "UPDATE `user_tbl` SET `healthStatus`='POSITIVE',`quarantine_date`= '$fdate' WHERE `card_id` = '$this->cid'";
    $data =$con->prepare($sql);
    if($data->execute()){
    return true;
    }else {
    return false;
    }
  }
  public function upUQ(){
    $con = $this->con();
    $sql = "UPDATE `user_tbl` SET `healthStatus`='NEGATIVE',`quarantine_date`= NULL WHERE `card_id` = '$this->cid'";
    $data =$con->prepare($sql);
    if($data->execute()){
    return true;
    }else {
    return false;
    }
  }

}

 ?>

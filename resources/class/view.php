<?php
class view extends config{
  public $cid;

  public function __construct($cid){
    $this->cid = $cid;
  }

  public function chkAccess(){
    $con = $this->con();
    $sql = "SELECT * FROM `user_tbl` WHERE `card_id` = '$this->cid'";
    $data =$con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result  as $res){
      $healthStat = $res['healthStatus'];
    }
    if($healthStat !== 'NEGATIVE' || $healthStat == NULL){
      return false;
    }else {
      return true;
    }
  }

  public function chkPen(){
    $con = $this->con();
    $sql = "SELECT * FROM `transaction_tbl` WHERE `card_id` = '$this->cid' AND `transact_status` = 'PENDING'";
    $data =$con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)) {
      return true;
    }else {
      return false;
    }
  }
  public function chkQ(){
    $date_now = date("Y-m-d");
    $con = $this->con();
    $sql = "SELECT * FROM `user_tbl` WHERE `card_id` = '$this->cid'";
    $data =$con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result  as $res){
      $quarantine_date = $res['quarantine_date'];
    }
    if($quarantine_date < $date_now){
      return true;
    }else {
      return false;
    }
  }

  public function viewPUI(){
    $now = date("Y-m-d H:i:s");
    $start_date = strtotime($now);
    $end_date = strtotime("-14 day", $start_date);
    $fdate = date("Y-m-d H:i:s", $end_date);
    $con = $this->con();
    $sql = "SELECT * FROM `transaction_tbl` WHERE `card_id` = '$this->cid' AND `in_time` BETWEEN '$fdate' AND '$now'";
    $data =$con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $res){
      $posin = $res['in_time'];
      $posout = $res['out_time'];
      $est = $res['est_name'];
      var_dump($posin);
      var_dump($posout);
      var_dump($est);
      var_dump($this->cid);

      $con = $this->con();
      $sql = "SELECT * FROM `transaction_tbl` WHERE `card_id` != '$this->cid' AND `est_name` = '$est' AND (`in_time` BETWEEN '$posin' AND '$posout' OR `out_time` BETWEEN '$posin' AND '$posout' OR (`in_time` < '$posin' AND `out_time` > '$posout'))";
      $data =$con->prepare($sql);
      $data->execute();
      $rows = $data->fetchAll(PDO::FETCH_ASSOC);
      foreach($rows as $row){
        $now = date("Y-m-d H:i:s");
        $start_date = strtotime($now);
        $end_date = strtotime("+14 day", $start_date);
        $fdate = date("Y-m-d H:i:s", $end_date);
        $con = $this->con();
        $sql = "UPDATE `user_tbl` SET `healthStatus`='PUI',`quarantine_date`= '$fdate' WHERE `card_id` = '$row[card_id]'";
        $data =$con->prepare($sql);
        $data->execute();
        $con1 = $this->con();
        $sql1 = "SELECT * FROM `user_tbl` WHERE  `card_id` = '$row[card_id]'";
        $data1 =$con1->prepare($sql1);
        $data1->execute();
        $results = $data1->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $result1){
                  $email1[] = "$result1[user_Email]";
                  $quarantine_date1 = "$result1[quarantine_date]";
                  $user_Cnumber1[] = "$result1[user_Cnumber]";
                }

              }
            }
            $email = implode(",",$email1);
            $quarantine_date = $quarantine_date1;
            $user_Cnumber = implode(",",$user_Cnumber1);
            header('location: vendor/sendmail.php?email='.$email.'&quarantine_date='.$quarantine_date.'&user_Cnumber='.$user_Cnumber);
          }

          public function viewPic(){
            $con = $this->con();
            $sql = "SELECT * FROM user_tbl WHERE card_id = '$this->cid'";
            $data =$con->prepare($sql);
            $data->execute();
            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $res){
              $user_picture = $res['user_picture'];
            }
            echo '
                 <img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $user_picture ).'"/>
                ';
          }
}
?>

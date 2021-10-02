<?php
class insert extends config{

  public $card_id;
  public $est_name;

  public function __construct($card_id=null,$est_name=null){
    $this->card_id = $card_id;
    $this->est_name = $est_name;
  }

  public function insertTransaction(){
    date_default_timezone_set('Asia/Hong_Kong');
    $inTime = date("Y-m-d H:i:s");
    $con = $this->con();
    $sql = "INSERT INTO `transaction_tbl`(`card_id`, `in_time`, `est_name`) VALUES (?,?,?)";
    $data =$con->prepare($sql);
    if($data->execute([$this->card_id,$inTime,$this->est_name])){
    return true;
    }else {
    return false;
    }
  }
}

 ?>

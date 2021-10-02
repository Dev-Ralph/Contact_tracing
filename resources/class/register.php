<?php
class register extends config{
  public $card_id;
  public $user_Fname;
  public $user_Lname;
  public $user_picture;
  public $user_Email;
  public $user_Address;
  public $user_Cnumber;

  public function __construct($card_id = null,$user_Fname = null,$user_Lname = null,$user_picture = null,$user_Email = null,$user_Address = null,$user_Cnumber = null){
    $this->card_id = $card_id;
    $this->user_Fname = $user_Fname;
    $this->user_Lname = $user_Lname;
    $this->user_picture = $user_picture;
    $this->user_Email = $user_Email;
    $this->user_Address = $user_Address;
    $this->user_Cnumber = $user_Cnumber;
  }

  public function registerCrd(){
    $con = $this->con();
    $sql = "INSERT INTO `user_tbl`(`card_id`, `user_Fname`, `user_Lname`,`user_picture`,`user_Email`, `user_Address`, `user_Cnumber`) VALUES (?,?,?,?,?,?,?)";
    $data =$con->prepare($sql);
    $data->bindParam(1, $user_picture);
    if($data->execute([$this->card_id,$this->user_Fname,$this->user_Lname,$this->user_picture,$this->user_Email,$this->user_Address,$this->user_Cnumber])){
    return true;
    }else {
    return false;
    }
  }
}

 ?>

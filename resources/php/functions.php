<?php
  function insTransact(){
    if(!empty($_POST['card_id'])){
      $card_id = $_POST['card_id'];
      $est_name = "CEU";
      $insert = new insert($card_id,$est_name);
      $view = new view($card_id);
      if ($view->chkPen()) {
        if ($view->chkQ()) {
          $edit = new edit($card_id);
          if($edit->upUQ()){
            // echo 'In Successfully.';
            if ($view->chkAccess()) {
              if($insert->insertTransaction()){
                $view->viewPic();
                echo '
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 15%;">
                 <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                 <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                 </svg>
                 <p class="success">Access Granted!</p>
                ';
              }else {
                echo  'Insert Error';
              }
            }else {
              echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 15%;">
                  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                </svg>
                <p class="error">Access Denied!</p>';
            }
          }
        }else{
          echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 15%;">
                  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                </svg>
                <p class="error">Access Denied!</p>';
        }
        }else {
          $edit = new edit($card_id);
          if($edit->updateTransact()){
            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 15%;">
               <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
               <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
               </svg>
               <p class="success">Out Successfully!</p>';
          }else {
            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 15%;">
                <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
              </svg>
              <p class="error">Out Failed!</p>';
          }
        }
      }
    }

    function registerCard(){
      if(!empty($_POST['register'])){
        $card_id = $_POST['card_id'];
        $user_Fname = $_POST['user_Fname'];
        $user_Lname = $_POST['user_Lname'];
        $user_picture = file_get_contents($_FILES['usr_picture']['tmp_name']);
        $user_Email = $_POST['user_Email'];
        $user_Address = $_POST['user_Address'];
        $user_Cnumber = $_POST['user_Cnumber'];
        $register = new register($card_id,$user_Fname,$user_Lname,$user_picture,$user_Email,$user_Address,$user_Cnumber);
        if($register->registerCrd()){
          echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 10%">
                  <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                  <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                  </svg>
                  <p class="success">Registered!</p>';
        }else {
          echo  '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="margin-top: 10%;">
              <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
              <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
              <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
            </svg>
            <p class="error">Register Failed!</p>';
        }
      }
    }

  function upPost(){
      if(!empty($_GET['positive'])){
          $cid = $_GET['positive'];
          $edit = new edit($cid);
          if($edit->updateUser()){
            $view = new view($cid);
            if ($view->viewPUI($cid)) {
              echo  'Update Successfull.';
            }
          }else {
            echo  'Update Error.';
          }
      }
  }

  function viewAllUsers(){
    if (isset($_GET['submitU'])){
      $search = $_GET['search'];
      $filter = $_GET['filter'];
      $viewOnly = new viewOnly($search,$filter);
      $viewOnly->searchUsers();
    }else{
      $viewOnly = new viewOnly();
      $viewOnly->viewUsers();
    }

  }

  function viewAllLogs(){
    if (isset($_GET['submitL'])){
      $search = $_GET['search'];
      $filter = $_GET['filter'];
      $viewOnly = new viewOnly($search,$filter);
      $viewOnly->searchLogs();
    }else{
    $viewOnly = new viewOnly();
    $viewOnly->viewLogs();
  }
  }
  
  function viewPicture(){
    $view = new view();
    $view->viewPic();
  }
 ?>

<?php
   require_once 'resources/php/init.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Prototype</title>
      <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
      <link href="vendor/css/all.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css"  href="resources/css/styles.css">
      <script src="https://kit.fontawesome.com/53829bddec.js" crossorigin="anonymous"></script>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
      .fas{
        font-size: 50px;
      }

      h3{
          font-family: 'Roboto', sans-serif;
          color: black;
          opacity: 0.5;
      }

      .card{
        box-shadow: 3px 9px 19px -14px rgba(0,0,0,1);
        -webkit-box-shadow: 3px 9px 19px -14px rgba(0,0,0,1);
        -moz-box-shadow: 3px 9px 19px -14px rgba(0,0,0,1);
      }

      a{
        transition: 0.5s ease;
        color: black;
        opacity: 0.5;
      }

      a:hover{
        opacity: 1;
        color: #4d4dff;
      }

      .move-bot{
        margin-top: 15vh;
      }
    </style>
   <body>
      <div class="container mt-5">
        <h3 class="text-center pb-5 move-bot">RFID-BASED CONTACT TRACING</h3>
         <div class="row no-gutters text-center">
           <div class="col-md-3">
             <a href="http://localhost:3000/Contact_tracing/register.php" class="custom-card p-2">
               <div class="card" style="width: 10rem; display: inline-block">
                 <div class="text-center mt-2">
                   <i class="fas fa-id-card"></i>
                 </div>
                 <div class="card-body p-0 text-center">
                   <h5 class="card-title">Register</h5>
                 </div>
               </div>
             </a>
           </div>
             <!--  -->
             <div class="col-md-3">
               <a href="http://localhost:8080/Contact_tracing/insertTransact.php" class="custom-card p-2">
                 <div class="card" style="width: 10rem; display: inline-block">
                   <div class="text-center mt-2">
                     <i class="fas fa-calendar-day"></i>
                   </div>
                   <div class="card-body p-0 text-center">
                     <h5 class="card-title">Insert Logs</h5>
                   </div>
                 </div>
               </a>
             </div>
             <!--  -->
             <div class="col-md-3">
               <a href="http://localhost:80/Contact_tracing/list_users.php" class="custom-card p-2">
                 <div class="card" style="width: 10rem; display: inline-block">
                   <div class="text-center mt-2">
                     <i class="fas fa-users"></i>
                   </div>
                   <div class="card-body p-0 text-center">
                     <h5 class="card-title">List of Users</h5>
                   </div>
                 </div>
               </a>
             </div>
             <!--  -->
             <div class="col-md-3">
               <a href="http://localhost:80/Contact_tracing/list_logs.php" class="custom-card p-2">
                 <div class="card" style="width: 10rem; display: inline-block">
                   <div class="text-center mt-2">
                     <i class="fas fa-list"></i>
                   </div>
                   <div class="card-body p-0 text-center">
                     <h5 class="card-title">List of Logs</h5>
                   </div>
                 </div>
               </a>
             </div>
         </div>
      </div>
   </body>
</html>

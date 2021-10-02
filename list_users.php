<?php
   require_once 'resources/php/init.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Prototype</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <script src="/socket.io/socket.io.js"></script>
      <style>
      .container-fluid{
        min-height: 90vh;
      }
      h6{
        font-family: 'Roboto', sans-serif;
        opacity: 0.5;
      }

      .h-1{
          color: black;
          font-size: 300%;
          font-family: 'Roboto', sans-serif;
          font-weight: bold;
      }

      .h-2{
        color: black;
        font-size: 300%;
        font-family: 'Roboto', sans-serif;
        font-weight: lighter;
      }
      </style>
      <body>

       <div class="container-fluid">
       <div class="container p-3">
         <nav class="navbar navbar-expand-lg navbar-light bg-none p-0">
           <!-- <h5 class="pt-3">RFID Based Contact Tracing</h5> -->
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav ml-auto">
               <a class="nav-item nav-link active" href="http://localhost:80/Contact_tracing/index.php">Home</a>
             </div>
           </div>
         </nav>
         <div class="heading pt-4">
           <span class="h-1">User</span>
           <span class="h-2">Lists</span>
           <form class="" action="" method="get">
             <div class="form-row float-lg-right">
               <div class="pl-2 pb-2">
                 <input type="text" class="form-control" id="inlineFormInputGroup" name="search" placeholder="Search Here" autocomplete="off">
               </div>
               <label class="mx-3" for="ControlSelect">Filter By</label>
               <div class="form-group">
                 <select class="form-control" name="filter" id="ControlSelect">
                   <option value="card_id">Card ID</option>
                   <option value="user_Fname">First Name</option>
                   <option value="user_Lname">Last Name</option>
                   <option value="user_Address">Address</option>
                 </select>
               </div>
               <div class="pl-2 pb-2">
                <input type="submit" class="btn btn-primary mb-2" name="submitU" value="Search">
               </div>
             </div>
           </form>
         </div>
         <?php viewAllUsers(); 
         ?>
       </div>
   </div>
        <!-- <a href="http://localhost:80/Contact_tracing/index.php">Return</a> -->
   </body>
   <script src="vendor/js/jquery.js"></script>
   <script src="vendor/js/bootstrap.bundle.min.js"></script>
</html>

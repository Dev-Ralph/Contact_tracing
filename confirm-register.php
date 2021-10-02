<?php
   require_once 'resources/php/init.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Prototype</title>
      <!-- <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
      <link href="vendor/css/all.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css"  href="resources/css/styles.css">
      <link rel="preconnect" href="https://fonts.gstatic.com"> -->
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <style>
      svg {
        width: 400px;
        display: block;
        margin: 40px auto 0;
      }

      .path {
        stroke-dasharray: 1000;
        stroke-dashoffset: 0;
      }
      .circle {
        -webkit-animation: dash .9s ease-in-out;
        animation: dash .9s ease-in-out;
      }
      .line {
        stroke-dashoffset: 1000;
        -webkit-animation: dash .9s .35s ease-in-out forwards;
        animation: dash .9s .35s ease-in-out forwards;
      }
      .check {
        stroke-dashoffset: -100;
        -webkit-animation: dash-check .9s .35s ease-in-out forwards;
        animation: dash-check .9s .35s ease-in-out forwards;
      }

      p {
        text-align: center;
        margin: 20px 0 60px;
        font-size: 1.25em;
      }
      .success {
        color: #73AF55;
      }
      .error {
        color: #D06079;
      }


      @-webkit-keyframes dash {
        0% {
          stroke-dashoffset: 1000;
        }
        100% {
          stroke-dashoffset: 0;
        }
      }

      @keyframes dash {
        0% {
          stroke-dashoffset: 1000;
        }
        100% {
          stroke-dashoffset: 0;
        }
      }

      @-webkit-keyframes dash-check {
        0% {
          stroke-dashoffset: -100;
        }
        100% {
          stroke-dashoffset: 900;
        }
      }

      @keyframes dash-check {
        0% {
          stroke-dashoffset: -100;
        }
        100% {
          stroke-dashoffset: 900;
        }
      }
      a{
        font-size: 18px;
        color: black;
        opacity: 0.5;
        transition: 0.5s ease;
      }
      a:hover{
        color: black;
        text-decoration:none;
        opacity: 0.8;
      }
    </style>
   <body>
     <div class="container p-5">
       <form action="" method="POST">
         <?php
         registerCard();
         header( "refresh:5;url=http://localhost:3000/Contact_tracing/register.php" );
         ?>
       </form>
     </div>
   </body>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

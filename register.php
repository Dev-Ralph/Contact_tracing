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
      <link href="vendor/css/all.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css"  href="resources/css/styles.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
      <script src="/socket.io/socket.io.js"></script>
      <style>
          *{
                margin: 0;
                padding: 0;
            }
            html{
                background-color: white;
                color: #555;
                font-family: "lato","Verdana";
                font-size: 20px;
                text-rendering: optimizeLegibility;
                scroll-behavior: smooth;
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

          input::-webkit-outer-spin-button,
          input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
          }
    </style>
    <body>
    <div class="container my-0 py-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-none p-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active mt-4" href="http://localhost:80/Contact_tracing/index.php">Home</a>
          </div>
        </div>
      </nav>
    </div>
      <section>
        <div class="container p-4">
          <div class="heading">
            <span class="h-1">Register</span>
            <span class="h-2">Card</span>
          </div>
          <form action="http://localhost:80/Contact_tracing/confirm-register.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Card ID</label>
                <input type="text" class="form-control " name="card_id" id="card_id" autocomplete="off" placeholder="XXXXXX" required>
                <!-- <input type="text" class="form-control readonly" name="card_id" id="card_id" autocomplete="off" placeholder="XXXXXX" required> -->
                <small class="text-muted">Tap your card to the scanner to get the ID</small>
                <label for="usr_picture">Select a piktyur:</label>
                <input type="file" class="form-control-file" id="usr_picture" name="usr_picture">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">First Name</label>
                <input type="text" class="form-control"name="user_Fname" placeholder="First Name" autocomplete="off" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Last Name</label>
                <input type="text" class="form-control" name="user_Lname" placeholder="Last Name" autocomplete="off" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress">Email</label>
                <input type="email" class="form-control"  name="user_Email" placeholder="Email" autocomplete="off" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputAddress">Phone Number</label>
                <input type="number" class="form-control"  name="user_Cnumber" placeholder="Phone Number" autocomplete="off" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputHAddress">Address</label>
                <input type="text" class="form-control" name="user_Address" placeholder="Address" autocomplete="off" required>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" name="register" value="Register"/>
          </form>
        </div>
      </section>
    </body>
    <script>
        var socket = io();
        socket.on('data', function(data) {
            console.log(data);
            document.getElementById('card_id').value = data; 
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>
</html>

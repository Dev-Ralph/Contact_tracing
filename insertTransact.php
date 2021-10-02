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
      <script src="/socket.io/socket.io.js"></script>
      <style>
      header{

      }
      h1{
        font-family: 'Roboto', sans-serif;
        margin-top: 15%;
        font-size: 100px;
        color: #474242;
      }
      h6{
        font-family: 'Roboto', sans-serif;
        opacity: 0.5;
      }
      .arrow
          {
          color: #474242;
          position: relative;
          bottom: -2rem;
          left: 50%;
          margin-left:-20px;
          width: 70px;
          height: 70px;

          /**
           * Dark Arrow Down
           */
          background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI1MTIiIGlkPSJzdmcyIiB2ZXJzaW9uPSIxLjEiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSIgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIiB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxkZWZzIGlkPSJkZWZzNCIvPjxnIGlkPSJsYXllcjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAsLTU0MC4zNjIyKSI+PHBhdGggZD0ibSAxMjcuNDA2MjUsNjU3Ljc4MTI1IGMgLTQuOTg1MywwLjA3ODQgLTkuOTEwNzcsMi4xNjMwOCAtMTMuNDM3NSw1LjY4NzUgbCAtNTUsNTUgYyAtMy42MDA1NjUsMy41OTkyNyAtNS42OTY4ODMsOC42NTg5NSAtNS42OTY4ODMsMTMuNzUgMCw1LjA5MTA1IDIuMDk2MzE4LDEwLjE1MDczIDUuNjk2ODgzLDEzLjc1IEwgMjQyLjI1LDkyOS4yNSBjIDMuNTk5MjcsMy42MDA1NiA4LjY1ODk1LDUuNjk2ODggMTMuNzUsNS42OTY4OCA1LjA5MTA1LDAgMTAuMTUwNzMsLTIuMDk2MzIgMTMuNzUsLTUuNjk2ODggTCA0NTMuMDMxMjUsNzQ1Ljk2ODc1IGMgMy42MDA1NiwtMy41OTkyNyA1LjY5Njg4LC04LjY1ODk1IDUuNjk2ODgsLTEzLjc1IDAsLTUuMDkxMDUgLTIuMDk2MzIsLTEwLjE1MDczIC01LjY5Njg4LC0xMy43NSBsIC01NSwtNTUgYyAtMy41OTgxNSwtMy41OTEyNyAtOC42NTA2OCwtNS42ODEyNyAtMTMuNzM0MzgsLTUuNjgxMjcgLTUuMDgzNjksMCAtMTAuMTM2MjIsMi4wOSAtMTMuNzM0MzcsNS42ODEyNyBMIDI1Niw3NzguMDMxMjUgMTQxLjQzNzUsNjYzLjQ2ODc1IGMgLTMuNjY2NzgsLTMuNjY0MjMgLTguODQ4MDEsLTUuNzY0NDIgLTE0LjAzMTI1LC01LjY4NzUgeiIgaWQ9InBhdGgzNzY2LTEiIHN0eWxlPSJmb250LXNpemU6bWVkaXVtO2ZvbnQtc3R5bGU6bm9ybWFsO2ZvbnQtdmFyaWFudDpub3JtYWw7Zm9udC13ZWlnaHQ6bm9ybWFsO2ZvbnQtc3RyZXRjaDpub3JtYWw7dGV4dC1pbmRlbnQ6MDt0ZXh0LWFsaWduOnN0YXJ0O3RleHQtZGVjb3JhdGlvbjpub25lO2xpbmUtaGVpZ2h0Om5vcm1hbDtsZXR0ZXItc3BhY2luZzpub3JtYWw7d29yZC1zcGFjaW5nOm5vcm1hbDt0ZXh0LXRyYW5zZm9ybTpub25lO2RpcmVjdGlvbjpsdHI7YmxvY2stcHJvZ3Jlc3Npb246dGI7d3JpdGluZy1tb2RlOmxyLXRiO3RleHQtYW5jaG9yOnN0YXJ0O2Jhc2VsaW5lLXNoaWZ0OmJhc2VsaW5lO2NvbG9yOiMwMDAwMDA7ZmlsbDojMjIyMjIyO2ZpbGwtb3BhY2l0eToxO2ZpbGwtcnVsZTpub256ZXJvO3N0cm9rZTpub25lO3N0cm9rZS13aWR0aDozOC44ODAwMDEwNzttYXJrZXI6bm9uZTt2aXNpYmlsaXR5OnZpc2libGU7ZGlzcGxheTppbmxpbmU7b3ZlcmZsb3c6dmlzaWJsZTtlbmFibGUtYmFja2dyb3VuZDphY2N1bXVsYXRlO2ZvbnQtZmFtaWx5OlNhbnM7LWlua3NjYXBlLWZvbnQtc3BlY2lmaWNhdGlvbjpTYW5zIi8+PC9nPjwvc3ZnPg==);
          background-size: contain;
          }

          .bounce {
          animation: bounce 2s infinite;
          }

          @keyframes bounce {
          0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
          }
          40% {
            transform: translateY(-30px);
          }
          60% {
            transform: translateY(-15px);
          }
        }
      </style>
   <body>
    <header>
    <a class="text-muted" href="http://localhost:80/Contact_tracing/index.php"><h6 class="text-center pt-3">RFID Based Contact Tracing</h6></a>
      <div class="container p-5">
        <h1 class="text-center">Tap your card into the scanner</h1>
        <div class="arrow bounce"></div>
      </div>
    </header>
    <form action="http://localhost:80/Contact_tracing/confirm-insertTransact.php" method="POST" id="form-log">
        <input  name="card_id" placeholder="Card ID" id="card_id" required/>
        <!-- <input type="hidden" name="card_id" placeholder="Card ID" id="card_id" required/> -->
        <!-- <a href="http://localhost:80/Contact_tracing/index.php" class="btn btn-primary">Return</a> -->
    </form>
   <script>
        var socket = io();
        socket.on('data', function(data) {
            console.log(data);
            document.getElementById('card_id').value = data;
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script>
        function ready( fn ) {
        if ( document.attachEvent ? document.readyState === 'complete' : document.readyState !== 'loading' ) {
        fn();
        } else {
        document.addEventListener( 'DOMContentLoaded', fn );
        }
        }
        ready( function refresh() {
            if ( document.getElementById( 'card_id' ).value != '' ) {
                document.getElementById( 'form-log' ).submit();
            }
            setTimeout(refresh,1000);
        });
    </script>
   </body>
</html>

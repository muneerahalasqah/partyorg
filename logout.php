<?php
session_start();

session_destroy();
?>
<html>
    <head>
    <script src="js/sweetalert2.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script
      src="https://code.jquery.com/jquery-2.2.4.js"
      integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
      crossorigin="anonymous"></script>
    </head>
    <body>
        <script>
            swal({title:"Logged Out,",text:"Good bye, we hope to see you soon!",type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "index.php";});
        </script>
    </body>
</html>
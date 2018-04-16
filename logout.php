<?php
session_start();

session_destroy();
?>
<html>
     <head>
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <script
      src="https://code.jquery.com/jquery-2.2.4.js"
      integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <script src="js/sweetalert2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <script>
            swal({title:"Logged Out,",text:"Good bye, we hope to see you soon!",type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "index.php";});
        </script>
    </body>
</html>
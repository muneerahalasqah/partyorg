<?php
session_start();

session_destroy();
?>
<html>
     <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
    </head>
    <body>
        <script>
            swal({title:"Logged Out,",text:"Good bye, we hope to see you soon!",type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "index.php";});
        </script>
    </body>
</html>
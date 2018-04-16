<?php
session_start();
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
<?php
if (($key = array_search($_GET['id'],$_SESSION['plan'])) !== false) {
    unset($_SESSION['plan'][$key]);
    if(isset($_GET['cid'])){
        ?>
            <script>
                swal({title:"Done!",text:"Successfully deleted from the Party Plan", type: "success"}).then(function(){window.location.href = "cards.php?cid=<?php echo $_GET['cid']?>";});
            </script>
    <?php        
    } else {
      ?>
            <script>
                swal({title:"Done!",text:"Successfully deleted from the Party Plan", type: "success"}).then(function(){window.location.href = "cards.php";});
            </script>
    <?php  
    }
}
?>
        </body>
</html>
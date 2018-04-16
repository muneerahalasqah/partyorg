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
if(empty($_SESSION['plan'])) {
   $_SESSION['plan']=array(); 
}

if (in_array($_GET['id'],$_SESSION['plan'])){
        ?>
    <script>
    swal({title:"This vendor already exists in the plan!",type: "warning"}).then(function(){window.location.href = "cards.php?cid=<?php echo $_GET['cid']?>";});
    </script>
<?php
    
} else {
    array_push($_SESSION['plan'],$_GET['id']);
    ?>
    <script>
        swal({title:"Done!",text:"Successfully added to the Party Plan",type: "success",showConfirmButton: false,
  timer: 2000}).then(function(){window.location.href = "cards.php?cid=<?php echo $_GET['cid']?>";});
    </script>
<?php
}
?>
    </body>
</html>
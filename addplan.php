<?php
session_start();
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
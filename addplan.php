<?php
session_start();
?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
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
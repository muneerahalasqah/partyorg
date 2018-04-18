<?php
session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
    </head>
<body>
<?php
if(empty($_SESSION['plan'])) {
   $_SESSION['plan']=array(); 
}

if (in_array($_GET['id'],$_SESSION['plan'])){
        ?>
    <script>
    swal({title:"This vendor already exists in the plan!",type: "warning"}).then(function(){window.location.href = "cards.php?cid=<?php echo $_GET['cid']; if(isset($_GET['lid'])) echo '&lid='.$_GET['lid']; if(isset($_GET['p'])) echo '&p='.$_GET['p']; if(isset($_GET['r'])) echo '&r='.$_GET['r'];?>";});
    </script>
<?php
    
} else {
    array_push($_SESSION['plan'],$_GET['id']);
    ?>
    <script>
        swal({title:"Done!",text:"Successfully added to the Party Plan",type: "success",showConfirmButton: false,
  timer: 2000}).then(function(){window.location.href = "cards.php?cid=<?php echo $_GET['cid']; if(isset($_GET['lid'])) echo '&lid='.$_GET['lid']; if(isset($_GET['p'])) echo '&p='.$_GET['p']; if(isset($_GET['r'])) echo '&r='.$_GET['r']; ?>";});
    </script>
<?php
}
?>
    </body>
</html>
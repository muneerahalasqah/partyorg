<?php
session_start();
?>
    <html>
    <head>
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
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
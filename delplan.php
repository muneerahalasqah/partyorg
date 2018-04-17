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
                swal({title:"Done!",text:"Successfully deleted from the Party Plan", type: "success"}).then(function(){window.location.href = "cards.php<?php if(isset($_GET['cid'])) echo "?cid=".$_GET['cid']; if(isset($_GET['lid'])) echo '&lid='.$_GET['lid']; if(isset($_GET['p'])) echo '&p='.$_GET['p']; if(isset($_GET['r'])) echo '&r='.$_GET['r']; ?>";});
            </script>
    <?php        
    } else {
      ?>
            <script>
                swal({title:"Done!",text:"Successfully deleted from the Party Plan", type: "success"}).then(function(){window.location.href = "cards.php<?php if(isset($_GET['cid'])) echo "?cid=".$_GET['cid']; if(isset($_GET['lid'])) echo '&lid='.$_GET['lid']; if(isset($_GET['p'])) echo '&p='.$_GET['p']; if(isset($_GET['r'])) echo '&r='.$_GET['r']; ?>";});
            </script>
    <?php  
    }
}
?>
        </body>
</html>
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
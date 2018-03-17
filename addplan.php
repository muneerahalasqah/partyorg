<?php
session_start();

if(empty($_SESSION['plan'])) {
   $_SESSION['plan']=array(); 
}

if (in_array($_GET['id'],$_SESSION['plan'])){
        ?>
<html>
<body>
    <script>
    alert('The vendor already exists in the party plan');
    window.location.href="index.php";
    </script>
</body>
</html>
<?php
    
} else {
    array_push($_SESSION['plan'],$_GET['id']);
    ?>
<html>
<body>
    <script>
    alert('The vendor has been added successfully!');
    window.location.href="cards.php?cid=<?php echo $_GET['cid']?>";
    </script>
</body>
</html>
<?php
}




?>
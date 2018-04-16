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
    require_once 'connect.php';
    if(isset($_POST['update'])){
        $cid=$_SESSION['cid'];
        $newfname=$_POST['newfname'];
        $newlname=$_POST['newlname'];
        $newlocation=$_POST['newloc'];
        //echo $cid,$newfname,$newlname,$newemail,$newlocation;
        $sql="UPDATE customer SET fname='".$newfname."',lname='".$newlname."',location_id='".$newlocation."' WHERE customer_id='".$cid."'";
        $query=mysqli_query($db,$sql);
        
        if($query){
            ?>
          <script>
            swal({title:"Success!",text:"Your account have been updated successfully", type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "account.php";});
        </script>
    <?php
          } else {
           ?>
          <script>
            swal({title:"Oops!",text:"A problem occured when trying to update your account", type: "error",}).then(function(){window.location.href = "account.php";});
    </script>
    <?php 
          }            
    }
    if(isset($_POST['uppass'])){
        $newpass=$_POST['newpass'];
        $confirm=$_POST['passconfirm'];
        $oldpass=$_POST['oldpass'];
        $cid=$_SESSION['cid'];
        $result=mysqli_query($db,"SELECT password FROM customer WHERE customer_id=$cid");
        $row=mysqli_fetch_row($result);
        $oldpassword=$row[0];
        if($newpass!=$confirm){
            ?>
          <script>
            swal({title:"Oops!",text:"The two passwords do not match", type: "warning",}).then(function(){window.location.href = "account.php";});  
        </script>
    <?php
        } else if($oldpass != $oldpassword){
            ?>
          <script>
            swal({title:"Oops!",text:"You entered the wrong old password", type: "error",}).then(function(){window.location.href = "account.php";});
        </script>
    <?php
        } else {
            mysqli_query($db,"UPDATE customer SET password='$newpass' WHERE customer_id='$cid'");
            ?>
          <script>
            swal({title:"Success!",text:"Your password have been updated successfully", type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "account.php";});
        </script>
    <?php
        }
    }
    ?>
</body>
</html>
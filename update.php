<?php
session_start();
?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
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
<?php
session_start();
?>
<html>
<body>
    <?php
    $db=mysqli_connect("localhost","root","","partyorg");
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
            alert('Updated your information successfuly!');
            window.location = "account.php";
        </script>
    <?php
          } else {
           ?>
          <script>
            alert('Problem in adding your information');
            window.location = "account.php";
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
            alert('The two passwords don not match');
            window.location = "account.php#pass";  
        </script>
    <?php
        } else if($oldpass != $oldpassword){
            ?>
          <script>
            alert('You need to enter the right password!');
            window.location = "account.php";
        </script>
    <?php
        } else {
            mysqli_query($db,"UPDATE customer SET password='$newpass' WHERE customer_id='$cid'");
            ?>
          <script>
            alert('Your password was updated successfuly!');
            window.location = "account.php";
        </script>
    <?php
        }
    }
    ?>
</body>
</html>
<?php 
session_start();

require 'connect.php';

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
    </head>
    <body>
<?php


// إذا نجح العضو في ملأ الإستمارة
if (isset($_POST['email']) AND isset($_POST['password']))
{
   // ...
   $email = $_POST['email'];
   $password = $_POST['password'];
    // أخذ البيانات من القاعدة إعتمادا على ايميل العضو 
    $check="SELECT * FROM customer WHERE email='$email'";
    $result=mysqli_query($db,$check);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        if($password==$row['password']){
            $_SESSION['cid'] = $row['customer_id'];
            $fname= $row['fname'];
            ?>
        <script>
              swal({title:"Welcome, <?php echo $fname; ?>",text:"You logged in successfully, redirecting you to Besher",type: "success",showConfirmButton: false,
  timer: 2000}).then(function(){window.location.href = "index.php";});
        </script>
        <?php
        } else {
            ?>
        <script>
            swal({title:"Incorrect!",text:"You entered the wrong password",type: "error"}).then(function(){window.location.href = "index.php";});
        </script>
        <?php 
        }
    } else {
        ?>
            <script>
            swal({title:"Sorry,",text:"No user reistered with this email",type: "error"}).then(function(){window.location.href = "index.php";});
            </script>
        <?php  
    }
       
   }
    ?>
    </body>
</html>


	

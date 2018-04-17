<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
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
    <script src="js/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
    </head>
    <body>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $subject="From: ".$name;
    $email=$_POST['email'];
    $message=$_POST['message'];
    
    $mail = new PHPMailer();
    $mail->addAddress('besher.service@gmail.com');
    $mail->setFrom($email);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    
    if($mail->send())
    {
        ?>
        <script>
        swal({title:"We have recieved your email successfully!",text:"And we'll reply soon",type: "success",showConfirmButton: false,
  timer: 2000}).then(function(){window.location.href = "index.php";});
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            swal({title:"Sorry!",text:"We couldn't receive your email :( ",type: "error"}).then(function(){window.location.href = "index.php";});
        </script>
        <?php
    }
}

?>
        </body>
</html>
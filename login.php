<?php 
session_start();

try 
{
$db = new PDO('mysql:host=localhost;dbname=partyorg', 'root', '');
} 
catch(PDOException $e)
{
  die('error'. $e->getMessage());
}


// إذا نجح العضو في ملأ الإستمارة
if (isset($_POST['email']) AND isset($_POST['password']))
{
   // ...
   $email = $_POST['email'];
   $password = $_POST['password'];
   // ...
   // أخذ البيانات من القاعدة إعتمادا على ايميل العضو 
   $response= $db->prepare('SELECT *
              FROM customer
              WHERE email = :mail
            ');
    $response->bindValue(':mail',$email,PDO::PARAM_STR);
    $response->execute();
    $member = $response->Fetch();
    $response->CloseCursor();
    
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
   // التأكد من أن العضو موجود في قاعدة البيانات 
   if(!$member){
        ?>
            <script>
            swal({title:"Sorry,",text:"No user reistered with this email",type: "error"}).then(function(){window.location.href = "index.php";});
            </script>
        <?php  
   }

    // مقارنة كلمة المرور التي أرسلها العضو بالموجودة في القاعدة 
   else if($password != $member['password']){     
        ?>
        <script>
            swal({title:"Incorrect!",text:"You entered the wrong password",type: "error"}).then(function(){window.location.href = "index.php";});
        </script>
        <?php 
   } else {
        //ذا كان كل شيء على ما يرام . نقوم بإنشاء متغير الجلسة وطبع رسالة ترحيبية 
   $_SESSION['cid'] = $member['customer_id'];
   $fname= $member['fname'];
   // ثم تحويله تلقائيا إلى أي صفحة نريد 
    ?>
            <script>
             swal({title:"Welcome, <?php echo $fname; ?>",text:"You logged in successfully, redirecting you to Besher",type: "success",showConfirmButton: false,
  timer: 2000}).then(function(){window.location.href = "index.php";});
            </script>
  <?php  
       
   }
    ?>
    </body>
</html>
        <?php
                                                 
}
?>

	

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

   // التأكد من أن العضو موجود في قاعدة البيانات 
   if(!$member){
        ?>
    <html>
        <body>
            <script> alert('Sorry, You are not a register member');
            window.location = "index.php";
            </script>
        </body>
    </html>
        <?php  

   }

   
    // مقارنة كلمة المرور التي أرسلها العضو بالموجودة في القاعدة 
   else if($password != $member['password']){
      
        ?>
    <html>
        <body>
            <script> alert('Sorry, You have entered the wrong password.');
            window.location = "index.php#id01";
            </script>
        </body>
    </html>
        <?php 
   } else {
        // إذا كان كل شيء على ما يرام . نقوم بإنشاء متغيرات الجلسة 
   $_SESSION['id'] = $member['customer_id'];
   $_SESSION['email'] = $member['email'];
   $fname= $member['fname'];
   // ثم تحويله تلقائيا إلى أي صفحة نريد 
    ?>
    <html>
        <body>
            <script> alert('Hello '+'<?php echo $fname; ?>'+'!');
            window.location = "index.php";
            </script>
        </body>
    </html>
  <?php  
       
   }
                                                 
}
?>

	

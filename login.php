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
   if(!$member)
   header('location:index.html');
   
    // مقارنة كلمة المرور التي أرسلها العضو بالموجودة في القاعدة 
   if($password != $member['password']) header('location:index.html');
   
    // إذا كان كل شيء على ما يرام . نقوم بإنشاء متغيرات الجلسة 
   $_SESSION['id'] = $member['customer_id'];
   $_SESSION['email'] = $member['email'];
   // ثم تحويله تلقائيا إلى أي صفحة نريد 
    ?>
    <html>
        <body>
            <script> alert('Hello  ');
            window.location = "index.html";
            </script>
        </body>
    </html>
  <?php  
}
?>

	

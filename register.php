<?php 
//session_start();


try 
{
$db = new PDO('mysql:host=localhost;dbname=partyorg', 'root', '');
} 
catch(PDOException $e)
{
  die('error'. $e->getMessage());
}



if (isset($_POST['submit']))
{
  $fname  = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pass_confirm = $_POST['pass_confirm'];
  $location  = $_POST['location'];

// معالجة البيانات 
// ...
// إدخال البيانات في القاعدة
  $stmt= $db->prepare('INSERT INTO customer (fname, lname, email, password , location_id) 
              VALUES (:name1,:name2, :mail, :pass1 , :city)
            ');
    $stmt->bindValue(':name1',$fname,PDO::PARAM_STR);
    $stmt->bindValue(':name2',$lname,PDO::PARAM_STR);
    $stmt->bindValue(':mail',$email,PDO::PARAM_STR);
    $stmt->bindValue(':pass1',$password,PDO::PARAM_STR);
    $stmt->bindValue(':city',$location,PDO::PARAM_STR);

    $stmt->execute();

    $stmt->CloseCursor();

    // تعيين جلسة لإشعار المستخدم بنجاح عملية تسجيله ، ثم تحويله لصفحة الدخول
   // $_SESSION['message'] = htmlspecialchars($fname). 'successful';
  
    header('location:index.html'); exit;
}
?>


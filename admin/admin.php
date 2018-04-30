<?php
$username = $_POST['username'];
$password = $_POST['password'];

if($username == 'admin' && $password == '1995')
{
    session_start();
    ?>
    <html>
        <body>
            <script> alert('Hello Adminstrator!');
            window.location = "vendor.php";
            </script>
        </body>
    </html>
<?php
} else {
      ?>
    <html>
        <body>
            <script> alert('Sorry, Wrong Info!');
            window.location = "index.html";
            </script>
        </body>
    </html>
<?php  
}
?>
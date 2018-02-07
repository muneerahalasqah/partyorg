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
            window.location = "vendor.html";
            </script>
        </body>
    </html>
<?php
} else {
      ?>
    <html>
        <body>
            <script> alert('Sorry, Wrong Info!');
            window.location = "admin.html";
            </script>
        </body>
    </html>
<?php  
}
?>
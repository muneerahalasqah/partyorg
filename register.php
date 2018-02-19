    <?php
$db = mysqli_connect('localhost','root','','partyorg');

//هذا يصير بحالة ضغط زر الريجستر
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $password=$_POST['password'];
    $pass_confirm=$_POST['pass_confirm'];
    $email=$_POST['email'];
    $location=$_POST['location'];
    
    //echo $fname.$lname.$password.$pass_confirm.$email.$email.$location;
    
    ////يتأكد من الايميل
    $sql="SELECT * from customer WHERE (email='$email');";    
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)>0)
    { $row=mysqli_fetch_assoc($result);
    if($email==$row['email'])
    {
         ?>
        <html>
            <body>
            <script> alert('Email already exists'); 
            window.location = "index.php";
            </script>
            </body>
        </html>
        <?php 
    } 
    
    //يتأكد من الباسوور لو يتطابفون أو لا
    else if($password==$pass_confirm){
     $sql = "INSERT INTO customer(fname,lname,email,password,location_id) VALUES('$fname','$lname','$email','$password','$location')";
     $query = mysqli_query($db,$sql);
        if($query){
             ?>
        <html>
            <body>
            <script> alert('You have been registered sucessfully!'); 
            window.location = "index.php";
            </script>
            </body>
        </html>
        <?php 
        } else {
             ?>
        <html>
            <body>
            <script> alert('there was a problem registering'); 
            //window.location = "vendor.php";
            </script>
            </body>
        </html>
        <?php 
        }
    }
    
  }
}
?>
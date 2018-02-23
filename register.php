<?php

$db = mysqli_connect('localhost','root','','partyorg');


if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	

	if(!isset($error_message)) {
         $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $email=$_POST['email'];
    $location=$_POST['location'];
        
        
		 $sql = "INSERT INTO customer(fname,lname,email,password,location_id) VALUES('$fname','$lname','$email','$password','$location')";
     $query = mysqli_query($db,$sql);
		if($query) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}   
    }}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
<style>

.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
    margin-left: 10px;
        width: 43%;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
 margin-left: 10px;
        width: 43%;
    }
.demo-table {
	background:white;
	width: 700px;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
    margin-left: 350px;
border: #a9a9a9 1px solid;
    }
.demo-table td {
	padding: 20px;
    
}
.demoInputBox {
	font-family:'Roboto Slab','Helvetica Neue',Helvetica,Arial,sans-serif;
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #fed136;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 250px;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Besher - بِشر</title>
      
      <!-----logo--------->
     <link rel="shortcut icon"
           href="img/logo21.png"width="16" height="16"
           />
      
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/login-register.css" rel="stylesheet">
  </head>

  <body id="page-top" style="background-color:#f1f1f1">

    <!-- Navigation -->
    <nav style="background-color:#5b6771 " class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav" >
      
        <div class="container">
          <!-- Login Modal & Button -->
       <button class="login-btn" type="button" onclick="document.getElementById('id01').style.display='block'">Login</button>
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><a href ="index.php"></a><img src ="img/Logo33.png"width="80" height="40"/></a>
          <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto text-left">
                <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="faq.html">FAQ</a>
              </li>
          </ul>
     
        </div>
      </div>
            </nav>

    
              <div id="id02" >
  
        <form  style="margin-top:200px"  name="frmRegistration" method="post" action="" >

<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message "><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
  
            
    
<div class="container" style="margin-left:10px">
    
<lable ><b>First Name</b><label class="redstar">*</label></lable><br>
<input type="text" class="demoInputBox" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
    
 <br>
    
<lable><b>Last Name</b><label class="redstar">*</label></lable><br>
<input type="text" class="demoInputBox" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>">
            
<br>
    
<lable><b>Password</b><label class="redstar">*</label></lable><br>
<input type="password" class="demoInputBox" name="password" value="">
    
<br>
    
<lable><b>Confirm Password</b><label class="redstar">*</label></lable><br>
<input type="password" class="demoInputBox" name="confirm_password" value="">

<br>
    
<lable><b>Email</b><label class="redstar">*</label></lable><br>
<input type="text" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
    
   
 <br>
     <label><b >City</b></label> <br>
        <?php
        $db=mysqli_connect('localhost', 'root', '','partyorg');
        $result = mysqli_query($db,"SELECT location_id,location_name FROM location");
        echo "<select name='location' style='width: 40%;'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
    <br><br>
    <button style="margin-left:20%" class="loginb" name="register-user" type="submit"value="Register" class="btnRegister">Register</button>
    </div>  
            
            
            
</form>
      </div>  

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; <b>Besher - بشر</b> Party Orgnizer 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
                <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-snapchat"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>

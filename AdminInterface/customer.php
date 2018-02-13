<html>
    <head>
    <title>customer management</title>
    <link href="partyorg/css/agency.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">

        <!-----logo--------->
    <link rel="shortcut icon"
           href="img/logo21.png"width="16" height="16" />
   
    </head>
    
    
    
    
    <body>
        <div class="menuAdmin" >
        <ul>
<a href="vendor.html">Vendor Manage</a>
<a href="Customer.php">Customer</a>
<a href="category.php">Category</a>
<a href="location.php">City</a>
<a href="type.php">Vendor Type</a>

</ul>
        </div>
        
        <div class="content">
            <div class="center">
            <img src="img/Logo33.png" width="30%">
            </div>
        <h1 style="text-align:center;">Customer Management</h1>
    
             
 
            
            <form method="POST" action="customer.php">
            <fieldset>
                  <legend>Delete Customer Account</legend><br>

                Customer E-mail: <input type="email" size="40" name="email" id="email">
                
                     <br><br>
                <div class="btn"><input type="submit" value="Delete" name="delete-btn">&nbsp;<input type="reset"value="Reset"></div>

            </fieldset>
        
            </form>    
        </div>
       <?php
        
        $db = mysqli_connect("localhost", "root", "", "partyorg");
        
        if (isset($_POST['delete-btn'])){
        $email = $_POST['email'];
        $result = mysqli_query($db,"SELECT fname,lname FROM customer WHERE email=$email");
        $row = mysqli_fetch_row($result);
        $fname = $row[0];
        $lname = $row[1];
        
        $sql = "DELETE FROM customer WHERE email='$email'";
        $query = mysqli_query($db, $sql);
        
        if ($query === TRUE) { 
        ?>

       <script> alert('The customer '+'<?php echo $fname." ".$lname; ?>'+' has been deleted sucessfully!'); 
         window.location = "customer.php";
        </script>
        
        <?php
        } else {
        ?>

        <script> alert('There was a proplem deletin the customer.'); 
         window.location = "customer.php";
        </script>
        
        <?php
        } }
        ?>
    </body>
</html>
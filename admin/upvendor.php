<html>
    <head>
    <title>vendor management</title>
    <link href="css/agency.min.css" rel="stylesheet">
      <!-----logo--------->
    <link rel="shortcut icon"
           href="img/logo21.png"width="16" height="16" />
        
        
<style> 
    body {
    background: #555;
}
         .btn{
                text-align: center;
                margin: 20px;
            }
            .btn input {
                font-size: 12pt;
                font-weight: bold;
            }
            .center {
                text-align: center;
            }
        
        </style>
   
    </head>
    
    
    
    
    <body>
        <div class="menuAdmin" >
        <ul>
<a href="vendor.php">Vendor Manage</a>
<a href="customer.php">Customer</a>
<a href="category.php">Category</a>
<a href="location.php">City</a>
<a href="type.php">Vendor Type</a>

</ul>
        </div>
        
        <div class="content">
            <div class="center">
            <img src="img/Logo33.png" width="30%">
            </div>
            <h1 style="text-align:center;">Vendor Management</h1>
    
     
<!-- Vendor Updation Form -->
    <form method="post" action="upvendor.php">
    <fieldset>
    <legend>Updating Vendor</legend><br>

        <?php
        $db = mysqli_connect("localhost","root","","partyorg");
        session_start();
        if (isset($_POST['update-btn'])){
            $vid = $_POST['vendor'];
            $_SESSION['vid']=$vid;
            $result = mysqli_query($db,"SELECT v_name,description,location_id,start_price,phone,email,instgram,twitter,google_maps,type_id FROM vendor WHERE vendor_id=$vid");
            $row=mysqli_fetch_row($result);
            $vname=$row[0];
            $desc=$row[1];
            $location=$row[2];
            $price=$row[3];
            $phone=$row[4];
            $email=$row[5];
            $insta=$row[6];
            $twitter=$row[7];
            $maps=$row[8];
            $type=$row[9];
        
            echo "Name: <br><input type='text' size='40' name='newname' value='$vname'><br>";
            echo "Email:<br><input type='email' size='40' name='newemail' value='$email'><br>";
            echo "Type: <br>";
            $result1 = mysqli_query($db,"SELECT type_id,type_name FROM v_type");
            echo "<select name='newtype' style='width: 40%;'>";               
            while ($myrow = mysqli_fetch_row($result1)) {
            printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
            echo "</select> <br>";
            echo "Description: <br>";
            echo "<textarea name='newdesc' rows='4' cols='30'>$desc</textarea> <br>";
            echo "Category: <br>";
            $result2 = mysqli_query($db,"SELECT category_id,category_name FROM category");
            echo "<select name='newcategory[]' multiple='multiple' style='width: 40%;'>";
            while ($myrow1 = mysqli_fetch_row($result2)) {
            printf("<option value= '%d'> %s </option>",$myrow1[0], $myrow1[1]); }
            echo "</select> <br>";
            echo "Location: <br>";
            $result3 = mysqli_query($db,"SELECT location_id,location_name FROM location");
            echo "<select name='newlocation' style='width: 40%;'>";           
            while ($myrow2 = mysqli_fetch_row($result3)) {
            printf("<option value= '%d'> %s </option>",$myrow2[0], $myrow2[1]);
                }
            echo "</select> <br>";
            echo "Strarting Price: <br><input type='text' size='40' name='newprice' value='$price'><br>";
            echo "Phone Number: <br><input type='text' size='40' name='newphone' value='$phone'><br>";
            echo "Instagram Account: <br><input type='text' size='40' name='newinsta' value='$insta'><br>";
            echo "Twitter Account: <br><input type='text' size='40' name='newtwitter' value='$twitter'><br>";
            echo "Google Maps: <br><input type='text' size='40' name='newmaps' value='$maps'><br>";
            }
        ?>
    
        <div class="btn"><input type="submit" value="Update" name="update">&nbsp;<input type="reset" value="reset"></div>
        </fieldset>
    </form>
    </div>
    <?php
        $db = mysqli_connect("localhost","root","","partyorg");

        if(isset($_POST['update'])){
            $newname=$_POST['newname'];
            $newemail=$_POST['newemail'];
            $newtype=$_POST['newtype'];
            $newdesc=$_POST['newdesc'];
            $newlocation=$_POST['newlocation'];
            $newprice=$_POST['newprice'];
            $newphone=$_POST['newphone'];
            $newinsta=$_POST['newinsta'];
            $newtwitter=$_POST['newtwitter'];
            $newmaps=$_POST['newmaps'];
            //$vid=$_POST['vendor'];
            $vendor=$_SESSION['vid'];
            
            $sql="UPDATE vendor SET v_name='".$newname."',description='".$newdesc."',location_id='".$newlocation."',start_price='".$newprice."',phone='".$newphone."',email='".$newemail."',instgram='".$newinsta."',twitter='".$newtwitter."',google_maps='".$newmaps."',type_id='".$newtype."' WHERE vendor_id='".$vendor."'";
            $query = mysqli_query($db,$sql);
        }
        ?>
    </body>
</html>
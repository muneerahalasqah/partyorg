<?php
require '../connect.php';

if(isset($_POST['add'])){
    
    $vname=$_POST['vname'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $desc=mysqli_real_escape_string($db,$_POST['desc']);
    $location=$_POST['location'];
    $price=$_POST['price'];
    $insta=$_POST['instagram'];
    $twitter=$_POST['twitter'];
    $phone=$_POST['tel'];
    $map=$_POST['map'];

    
    $sql="INSERT INTO vendor(v_name,description,location_id,start_price,phone,email,instgram,twitter,google_maps,type_id) VALUES('".$vname."','".$desc."','".$location."','".$price."',
    '".$phone."','".$email."','".$insta."','".$twitter."','".$map."','".$type."')";
    
    $query = mysqli_query($db,$sql);
    
    if($query===TRUE){ 
      
        $result = mysqli_query($db,"SELECT vendor_id FROM vendor WHERE v_name='$vname'");
        $row = mysqli_fetch_row($result);
        $vid = $row[0];
        foreach($_POST['category'] as $option){
         $sql1="INSERT INTO belong(vendor_id,category_id) VALUES('$vid','$option')";
         mysqli_query($db,$sql1);
        }
    ?> 
        <html>
            <body>
            <script> alert('The New Vendor '+'<?php echo $vname; ?>'+' has been added sucessfully!'); 
            window.location = "vendor.php";
            </script>
            </body>
        </html>
        <?php 
    } else {
        ?>
        <html>
        <body>
            <script> alert('There was a proplem adding the new vendor.!'); 
            window.location = "vendor.php";
            </script>
        </body>
        </html>
        <?php 
    }
}
?>
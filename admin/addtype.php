<?php
require("../connect.php");


if(isset($_POST['add-btn'])){
    $tname = $_POST['tname'];
    $sql = "INSERT INTO v_type(type_name) VALUES('$tname')";
    $query= mysqli_query($db, $sql);
    
    if ($query === TRUE) { 
   
    ?>
    <html>
        <body>
            <script> alert('The New Vendor Type '+'<?php echo $tname; ?>'+' has been added sucessfully!'); 
            window.location = "type.php";
            </script>
        </body>
    </html>
    <?php
    } else {
  ?>
    <html>
        <body>
            <script> alert('There was a problem adding the new vendor type.'); 
            window.location = "type.php";
            </script>
        </body>
    </html>
    <?php
    }
}

?>
<?php
include("dbconnect.php");
$db = mysqli_connect("localhost", "root", "", "partyorg");


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
    echo "<html><body><script> alert('And error in adding new type.'); </script></body></html>" . $conn->error;
    }
}

?>
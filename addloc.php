<?php
include("dbconnect.php");
$db = mysqli_connect("localhost", "root", "", "partyorg");


if(isset($_POST['add-btn'])){
    $locname = $_POST['locname'];
    $sql = "INSERT INTO location(location_name) VALUES('$locname')";
    $query= mysqli_query($db, $sql);
    
    if ($query === TRUE) { 
   
    ?>
    <html>
        <body>
            <script> alert('The New location '+'<?php echo $locname; ?>'+' has been added sucessfully!'); 
            window.location = "location.php";
            </script>
        </body>
    </html>
    <?php
    } else {
    echo "<html><body><script> alert('And error in adding new categroy.'); </script></body></html>" . $conn->error;
    }
}

?>
<?php
include("dbconnect.php");
$db = mysqli_connect("localhost", "root", "", "partyorg");


if(isset($_POST['add-btn'])){
    $cname = $_POST['cname'];
    $sql = "INSERT INTO category(category_name) VALUES('$cname')";
    $query= mysqli_query($db, $sql);
    
    if ($query === TRUE) { 
   
    ?>
    <html>
        <body>
            <script> alert('The New Category '+'<?php echo $cname; ?>'+' has been added sucessfully!'); 
            window.location = "category.php";
            </script>
        </body>
    </html>
    <?php
    } else {
    echo "<html><body><script> alert('And error in adding new categroy.'); </script></body></html>" . $conn->error;
    }
}

?>
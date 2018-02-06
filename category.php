<html>
    <head>
    <title>Category Management</title>
        <link href="css/agency.min.css" rel="stylesheet">

      <!-----logo--------->
    <link rel="shortcut icon"
           href="img/logo21.png"width="16" height="16" />
        
        <style>
            body {
            background: #555; }

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
<a href="vendor.html">Vendor Manage</a>
<a href="Customer.html">Customer</a>
<a href="category.html">Category</a>
<a href="location.html">City</a>
<a href="type.html">Vendor Type</a>

</ul>
        </div>
        
        <div class="content">
            <div class="center">
            <img src="img/Logo33.png" width="30%">
            </div>
            <h1 style="text-align:center;">Vendor Category Management</h1>
            
            <!-- Category addition -->
            <form method="POST" action="category.php">   
            
            <fieldset>
            <legend>Adding New Category</legend>
            <br>
            Category Name:  
                <input type="text" size="40" name="cname" id="cname"> <br>
                <div class="btn"><input type="submit" value="Add" name="add-btn">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
            
            <!-- Updating Category -->
            <form method="POST" action="category.php">   
            
            <fieldset>
            <legend>Updating Category</legend>
            <br>
            Category:
                <?php
                $db=mysqli_connect('localhost', 'root', '','partyorg');

                //$sql = "SELECT category_name FROM category";
                $result = mysqli_query($db,"SELECT category_name FROM category");

                echo "<select name='category_name' style='width: 60%;'>";
                                
                while ($myrow = mysqli_fetch_row($result)) {
                printf("<option value= '%s'> %s </option>",$myrow[0], $myrow[0]);
                }
                echo "</select>";
                ?>
               <br><br>
            New Category Name:  
                <input type="text" size="40" name="new_name" id="new_name"> <br>
                <div class="btn"><input type="submit" value="Update" name="update-btn">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
            
            <!-- Deleting Category -->
            <form method="POST" action="category.php">   
            
            <fieldset>
            <legend>Deleting Category</legend>
            <br>
            Category:
                <?php
                $db=mysqli_connect('localhost', 'root', '','partyorg');

                //$sql = "SELECT category_name FROM category";
                $result = mysqli_query($db,"SELECT category_name FROM category");

                echo "<select name='category_name' style='width: 60%;'>";
                                
                while ($myrow = mysqli_fetch_row($result)) {
                printf("<option value= '%s'> %s </option>",$myrow[0], $myrow[0]);
                }
                echo "</select>";
                ?>
                
                <div class="btn"><input type="submit" value="Delete" name="delete-btn">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
        </div>
    
    </body>
</html>

<?php
include("dbconnect.php");
$db = mysqli_connect("localhost", "root", "", "partyorg");


if(isset($_POST['add-btn'])){
    session_start();
    $cname = $_POST['cname'];
    $sql = "INSERT INTO category(category_name) VALUES('$cname')";
    mysqli_query($db, $sql);
} 
// <script> alert('The new category have been added succesfully!'); </script> -->

if(isset($_POST['update-btn'])){
    session_start();
    $category_name = $_POST['category_name'];
    $new_name = $_POST['new_name'];
    $sql = "UPDATE category SET category_name='$new_name' WHERE category_name='$category_name'";
    mysqli_query($db, $sql);
}
 
if(isset($_POST['delete-btn'])){
    session_start();
    $category_name = $_POST['category_name'];
    $sql = "DELETE FROM category WHERE category_name='$category_name'";
    mysqli_query($db, $sql);
}?>

?>
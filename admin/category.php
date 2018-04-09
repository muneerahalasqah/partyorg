<html>
    <head>
    <title>Category Management</title>
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">

      <!-----logo--------->
    <link rel="shortcut icon"
           href="img/logo21.png"width="16" height="16" />
 
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
            <h1 style="text-align:center;">Vendor Category Management</h1>
            
            <!-- Category addition -->
            <form method="POST" action="addcat.php">   
            
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
                require '../connect.php';
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
                
                //$sql = "SELECT category_name FROM category";
                $result = mysqli_query($db,"SELECT category_name FROM category");

                echo "<select name='category1' style='width: 60%;'>";
                                
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
        if(isset($_POST['update-btn'])){
        $category_name = $_POST['category_name'];
        $new_name = $_POST['new_name'];
        $sql1 = "UPDATE category SET category_name='$new_name' WHERE category_name='$category_name'";
        $query1 = mysqli_query($db, $sql1);
        
        if ($query1 === TRUE) { 
        //header('location: profile.html');
        
        ?>
        <script> alert('The category '+'<?php echo $category_name; ?>'+' has been updated sucessfully!'); 
         window.location = "category.php";
        </script>
        <?php
        
        } else {
        
        ?>
        <script> alert('There was a proplem updating the category.'); 
         window.location = "category.php";
        </script>
        <?php

        } 
                                        } 

        else if (isset($_POST['delete-btn'])){
        $category1 = $_POST['category1'];
        $sql2 = "DELETE FROM category WHERE category_name='$category1'";
        $query2 = mysqli_query($db, $sql2);
        
        if ($query2 === TRUE) { 
        ?>

       <script> alert('The category '+'<?php echo $category1; ?>'+' has been deleted sucessfully!'); 
         window.location = "category.php";
        </script>
        
        <?php
        } else {
        ?>

        <script> alert('There was a proplem deletin the category.'); 
         window.location = "category.php";
        </script>
        
        <?php
        } }
        ?>
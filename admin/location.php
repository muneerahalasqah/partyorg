<html>
    <head>
    <title>Location Management</title>
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
            <h1 style="text-align:center;">Location Management</h1>
            
            <!-- Location addition -->
            <form method="POST" action="addloc.php">   
            
            <fieldset>
            <legend>Adding New Location</legend>
            <br>
            Location Name:  
                <input type="text" size="40" name="locname" id="locname"> <br>
                <div class="btn">
                    <input type="submit" value="Add" name="add-btn">&nbsp;
                    <input type="reset"value="reset"></div>
            </fieldset>
            </form>
            
            <!-- Updating Location -->
            <form method="POST" action="location.php">   
            
            <fieldset>
            <legend>Updating Location</legend>
            <br>
            Location:
               <?php
                require '../connect.php';
                $result = mysqli_query($db,"SELECT location_name FROM location");

                echo "<select name='location_name' style='width: 60%;'>";
                                
                while ($myrow = mysqli_fetch_row($result)) {
                printf("<option value= '%s'> %s </option>",$myrow[0], $myrow[0]);
                }
                echo "</select>";
                ?>
                <br><br>
            New Location Name:  
                <input type="text" size="40" name="new_name" id="new_name"> <br>
                <div class="btn"><input type="submit" name="update-btn" value="Update">&nbsp;<input type="reset" value="reset"></div>
            </fieldset>
            </form>
            
            <!-- Deleting Location -->
            <form method="POST"action="location.php">   
            
            <fieldset>
            <legend>Deleting Location</legend>
            <br>
            Location:
                <?php
                
                $result = mysqli_query($db,"SELECT location_name FROM location");

                echo "<select name='location1' style='width: 60%;'>";
                                
                while ($myrow = mysqli_fetch_row($result)) {
                printf("<option value= '%s'> %s </option>",$myrow[0], $myrow[0]);
                }
                echo "</select>";
                ?>
                <br>
                
                <div class="btn"><input type="submit" name="delete-btn" value="Delete">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
        </div>
        
     <?php
        if(isset($_POST['update-btn'])){
        $location_name = $_POST['location_name'];
        $new_name = $_POST['new_name'];
        $sql1 = "UPDATE location SET location_name='$new_name' WHERE location_name='$location_name'";
        $query1 = mysqli_query($db, $sql1);
        
        if ($query1 === TRUE) { 
        //header('location: profile.html');
        
        ?>
        <script> alert('The location '+'<?php echo $location_name; ?>'+' has been updated sucessfully!'); 
         window.location = "location.php";
        </script>
        <?php
        
        } else {
        
        ?>
        <script> alert('There was a proplem updating the location.'); 
         window.location = "location.php";
        </script>
        <?php

        } 
                                        } 

        if (isset($_POST['delete-btn'])){
        $location1 = $_POST['location1'];
        $sql2 = "DELETE FROM location WHERE location_name='$location1'";
        $query2 = mysqli_query($db, $sql2);
        
        if ($query2 === TRUE) { 
        ?>

       <script> alert('The location '+'<?php echo $location1; ?>'+' has been deleted sucessfully!'); 
         window.location = "location.php";
        </script>
        
        <?php
        } else {
        ?>

        <script> alert('There was a proplem deletin the location.'); 
         window.location = "location.php";
        </script>
        
        <?php
        } }
        ?>
    </body>
</html>


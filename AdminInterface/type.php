<html>
    <head>
    <title>type Management</title>
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
            <h1 style="text-align:center;">Vendor Type Management</h1>
            
            <!-- Vendor Type addition -->
            <form method="POST" action="addtype.php">   
            
            <fieldset>
            <legend>Adding New Venndor Type</legend>
            <br>
            Vendor Type Name:  
                <input type="text" size="40" name="tname"> <br>
                <div class="btn"><input type="submit" value="Add" name="add-btn">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
            
            <!-- Updating Vendor Type -->
            <form method="POST" action="type.php">   
            
            <fieldset>
            <legend>Updating Vendor Type</legend>
            <br>
            Vendor Type:
                <?php
                $db=mysqli_connect('localhost', 'root', '','partyorg');
                $result = mysqli_query($db,"SELECT type_name FROM v_type");

                echo "<select name='type_name' style='width: 60%;'>";
                                
                while ($myrow = mysqli_fetch_row($result)) {
                printf("<option value= '%s'> %s </option>",$myrow[0], $myrow[0]);
                }
                echo "</select>";
                ?>
                <br><br>
            New Vendor Type Name:  
                <input type="text" size="40" name="new_name"> <br>
                <div class="btn"><input type="submit" value="Update" name="update-btn">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
            
            <!-- Deleting Vendor Type -->
            <form method="POST" action="type.php">   
            
            <fieldset>
            <legend>Deleting Vendor Type</legend>
            <br>
            Vendor Type:
                <?php
                $db=mysqli_connect('localhost', 'root', '','partyorg');
                $result = mysqli_query($db,"SELECT type_name FROM v_type");

                echo "<select name='type1' style='width: 60%;'>";
                                
                while ($myrow = mysqli_fetch_row($result)) {
                printf("<option value= '%s'> %s </option>",$myrow[0], $myrow[0]);
                }
                echo "</select>";
                ?>
                 <br>
                
                <div class="btn"><input type="submit" value="Delete" name="delete-btn">&nbsp;<input type="reset"value="reset"></div>
            </fieldset>
            </form>
        </div>
    <?php
        $db1 = mysqli_connect("localhost", "root", "", "partyorg");
        if(isset($_POST['update-btn'])){
        $type_name = $_POST['type_name'];
        $new_name = $_POST['new_name'];
        $sql1 = "UPDATE v_type SET type_name='$new_name' WHERE type_name='$type_name'";
        $query1 = mysqli_query($db1, $sql1);
        
        if ($query1 === TRUE) { 
        
        ?>
        <script> alert('The Vendor Type '+'<?php echo $type_name; ?>'+' has been updated sucessfully!'); 
         window.location = "type.php";
        </script>
        <?php
        
        } else {
        
        ?>
        <script> alert('There was a proplem updating the vendor type.'); 
         window.location = "location.php";
        </script>
        <?php

        } 
                                        } 

        else if (isset($_POST['delete-btn'])){
        $type1 = $_POST['type1'];
        $sql2 = "DELETE FROM v_type WHERE type_name='$type1'";
        $query2 = mysqli_query($db1, $sql2);
        
        if ($query2 === TRUE) { 
        ?>

       <script> alert('The Vendor Type '+'<?php echo $type1; ?>'+' has been deleted sucessfully!'); 
         window.location = "type.php";
        </script>
        
        <?php
        } else {
        ?>

        <script> alert('There was a proplem deletin the vendor type.'); 
         window.location = "type.php";
        </script>
        
        <?php
        } }
        ?>
    </body>
</html>
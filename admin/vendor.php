<html>
    <head>
    <title>vendor management</title>
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
            <h1 style="text-align:center;">Vendor Management</h1>
    
     
<!-- Adding Vendor Form -->        
<form method="POST" action="addvendor.php">   
       
    <fieldset>
     
        <legend>Vendor register</legend><br>
        Name:<br><input type="text" size="40" name="vname"><br>
        Email:<br><input type="email" size="40" name="email"><br><br>  
        Type:<br>
        <?php
        require '../connect.php';
        $result = mysqli_query($db,"SELECT type_id,type_name FROM v_type");
        echo "<select name='type' style='width: 40%;'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
        <br><br>
     
        Description:<br>
        <textarea name="desc" rows="4" cols="30">
        </textarea>
        <br><br>
     
        Category: <br>
        <?php
        $result = mysqli_query($db,"SELECT category_id,category_name FROM category");
        echo "<select name='category[]' multiple='multiple' style='width: 40%;'>";
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
            //printf("<input type='checkbox' name='category[]' value='%d'> %s <br>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
        <br><br>
     
        Location :<br>
        <?php
        $result = mysqli_query($db,"SELECT location_id,location_name FROM location");
        echo "<select name='location' style='width: 40%;'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
    <br>
     Starting Price:<br>
        <input type="text" size="40" name="price"><br>
     Phone Number:<br>
        <input type="tel" size="40" name="tel" id="tel"><br>
     Instagram Account:<br>
        <input type="text" size="40" name="instagram"><br>
     Twitter Account:<br>
        <input type="text" size="40" name="twitter"><br>
     Google Maps:<br>
        <input type="url" size="40" name="map" id="map"><br>
     <br><br>

     <div class="btn">
         <input type="submit" value="submit" name="add">&nbsp;<input type="reset"value="reset">
    </div>  
        
    </fieldset>
      </form>
            
            <!-- Vendor Uloading samples -->
    <form method="post" action="file.php" enctype="multipart/form-data">
    <fieldset>
    <legend>Uploading Vendor Samples</legend><br>
    Vendor:  
        <?php
        $result = mysqli_query($db,"SELECT vendor_id, v_name FROM vendor");
        echo "<select name='vendor' style='width: 60%;'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
        <br><br>
        Choose Samples: <br>
        <input type="file" name="samples[]" multiple><br>
        <br><br>
        <div class="btn"><input type="submit" value="Upload" name="upload">&nbsp;<input type="reset"value="reset"></div>
        </fieldset>
    </form>
     
   
            
    <!-- Vendor Deletion Form -->     
    <form method="post" action="vendor.php">
    <fieldset>
    <legend>Vendor delete</legend><br>
    Vendor:  
          <?php
        $result = mysqli_query($db,"SELECT vendor_id, v_name FROM vendor");
        echo "<select name='vendor' style='width: 60%;'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>      
        <br><br>
        <div class="btn"><input type="submit" value="Delete" name="delete-btn">&nbsp;<input type="reset"value="reset"></div>

    </fieldset>    
    </form>
    
    <!-- Vendor Updation Form -->
    <form method="post" action="upvendor.php">
    <fieldset>
    <legend>Updating Vendor</legend><br>
    Vendor:  
        <?php
        $result = mysqli_query($db,"SELECT vendor_id, v_name FROM vendor");
        echo "<select name='vendor' style='width: 60%;'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>      
        <br><br>
        <div class="btn"><input type="submit" value="Update" name="update-btn">&nbsp;<input type="reset"value="reset"></div>

        </fieldset>
    </form>
    </div>
        
    <?php
        
                
        if (isset($_POST['delete-btn'])){
        $vendor = $_POST['vendor'];
        $result = mysqli_query($db,"SELECT v_name FROM vendor WHERE vendor_id=$vendor");
        $row = mysqli_fetch_row($result);
        $vname = $row[0];
        $sql = "DELETE FROM belong WHERE vendor_id='$vendor'";
        $query = mysqli_query($db, $sql);
        
        if ($query === TRUE) { 
            mysqli_query($db,"DELETE FROM vendor WHERE vendor_id='$vendor'");
            mysqli_query($db,"DELETE FROM samples WHERE v_id='$vendor'");
        ?>

       <script> alert('The vendor '+'<?php echo $vname; ?>'+' has been deleted sucessfully!'); 
         window.location = "vendor.php";
        </script>
        
        <?php
        } else {
        ?>

        <script> alert('There was a proplem deleting the vendor.'); 
         window.location = "vendor.php";
        </script>
        
        <?php
        } }
        ?>
    
    </body>
</html>
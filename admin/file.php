<html>
<body>
<?php   

require '../connect.php';
//$name = $_FILES['samples']['name'];
//$tmp_name = $_FILES['samples']['tmp_name'];

if (isset($_POST['upload'])){
        $count = count($_FILES['samples']['name']);
        $location = 'samples/';
        $vid = $_POST['vendor'];
   
    //عشان يدور على كل الفايلات
        for($i=0;$i<$count;$i++){
            $sample=$_FILES['samples']['name'][$i];
            $path=$location.$sample;
            echo $path;
            print_r($_FILES['samples']['tmp_name']);
            
            //يرفع الفايلات
            $result=move_uploaded_file($_FILES['samples']['tmp_name'][$i],$path);
            if($result){
                echo "inside the if!";
                mysqli_query($db,"INSERT INTO samples(sample_path,v_id) VALUES('".$path."', '".$vid."')");
            }
        }?>
        <script>
            alert('The vendor samples have been uploaded successfully');
            //window.location.href="vendor.php";
    </script>
    <?php
}

 ?>
</body>
</html>
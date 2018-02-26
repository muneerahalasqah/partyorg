 <?php   

$db=mysqli_connect("localhost","root","","partyorg");
$name = $_FILES['samples']['name'];
$tmp_name = $_FILES ['samples']['tmp_name'];

if (isset($name)){
    if(!empty($name)){
        $location = '';
        
        if (move_uploaded_file($tmp_name,$location.$name)){
            echo 'uploaded! ';
            $path="admin/".$name;
            echo $path;
            $vid=11;
            $sql = "INSERT INTO samples(sample_path,v_id) VALUES($path,$vid)";
            $query = mysqli_query($db,$sql);
            if($query){
                echo "Added!!!!";
            } else {
                echo "Noo";
            }
        }}
        else {
            echo 'choose file';
        }
    
}
 ?>
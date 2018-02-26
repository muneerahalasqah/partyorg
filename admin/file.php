 <?php   


$name = $_FILES['samples']['name'];
$tmp_name = $_FILES ['samples']['tmp_name'];

if (isset($name)){
    if(!empty($name)){
        $location = '';
        
        if (move_uploaded_file($tmp_name,$location.$name)){
            echo 'uploaded!';
        }}
        else {
            echo 'choose file';
        }
    
}
 ?>
<?php
require_once 'connect.php';

if(isset($_GET['vid'], $_GET['rate'])){
    $vid= (int)$_GET['vid'];
    $rate= (int)$_GET['rate'];
    
    if(in_array($rate,[1,2,3,4,5])){
        
        $exist = $db->query("SELECT vendor_id FROM vendor WHERE vendor_id=$vid")->num_rows ? true: false;
        
        if($exist){
            $db->query("INSERT INTO rating(v_id,rate) VALUES($vid,$rate)");
        }
        
    }
        ?>
<html><body><script>
    alert('Thanks, your rating is noticed');
    window.location.href="account.php";
    </script></body></html>
<?php

}
?>
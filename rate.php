<?php
require_once 'connect.php';

if(isset($_GET['vid'], $_GET['rate'])){
    $vid= (int)$_GET['vid'];
    $rate= (int)$_GET['rate'];
    
    if(in_array($rate,[1,2,3,4,5])){
        
        $exist = $db->query("SELECT vendor_id,score,score_user FROM vendor WHERE vendor_id=$vid");
        
        if(mysqli_num_rows($exist)>0){
            $score=mysqli_fetch_assoc($exist);
            $nscore=$score['score']+$rate;
            $nuser=$score['score_user']+1;
            $db->query("UPDATE vendor SET score=$nscore,score_user=$nuser WHERE vendor_id=$vid");
        }
        
    }
        ?>
<html>
        <head>
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    </head>
    <body><script>
    swal({title:"Thanks!",text:"Your reviews make us take better descisions", type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "account.php";});
    </script></body></html>
<?php

}
?>
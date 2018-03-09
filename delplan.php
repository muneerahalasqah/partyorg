<?php
session_start();

if (($key = array_search($_GET['id'],$_SESSION['plan'])) !== false) {
    unset($_SESSION['plan'][$key]);
    ?>
    <html>
        <body>
            <script>alert('The vendor has been deleted successfully');
            window.location.href="index.php";
            </script>
        </body>
    </html>
    <?php
}
?>
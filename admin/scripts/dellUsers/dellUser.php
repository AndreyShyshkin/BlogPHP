<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/configs/DB_connect.php";
if(!empty($_GET)){
    $sql = "DELETE FROM usersname WHERE id = '".$_GET['id']."'";

    if(mysqli_query($conn, $sql)){
        echo '<script>window.location.href = "/admin/index.php";</script>';
    }else{
        echo "Error:" . mysqli_error($conn);
    }    
}
?>
<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM form2 WHERE id='$id'";
$data = mysqli_query($conn,$sql);
if($data){
    echo "deleted successful";
}
else{
    echo "not deleted";
}
?>
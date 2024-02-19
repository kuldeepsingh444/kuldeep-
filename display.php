<?php
include("conn.php");
session_start();
$user = $_SESSION['username'];
if($user){
     echo "";
}
else{
    echo header("location:login.php");
}
$sql = "SELECT * FROM form2";
$data = mysqli_query($conn , $sql);
$num = mysqli_num_rows($data);
if($num != 0){
    ?>
    <h2> Display all Data</h2>
    <table border="2" cellspacing="5">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Password </th>
            <th>gender</th>
            <th>city</th>
            <th>language</th>
            <th width="20%">operations</th>
        </tr>
    <?php
    while($row = mysqli_fetch_assoc($data)){
        echo"
        <tr>
        <td>".$row['id']."</td>
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['password']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['city']."</td>
        <td>".$row['language']."</td>
        <td><a href='edit.php?id=$row[id]'>edit</a>
        <a href='delete.php?id=$row[id]'>delete</a>
        </td>
        </tr>
        ";
    }
}
else{
    echo " table was not found";
}
?>
</table>
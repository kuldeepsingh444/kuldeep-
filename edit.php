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
$id =  $_GET['id'];
$sql = "SELECT * FROM form2 where id='$id'";
$data = mysqli_query($conn , $sql);
$num  = mysqli_num_rows($data);
$row = mysqli_fetch_assoc($data);
$language = $row['language'];
$lang1 = explode(",",$language);
echo $lang1;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form System</title>
</head>
<body>
<form action="" method="POST">
    <label> FirstName</label> <input type="text" name="fname" value="<?php echo $row['fname'];?>"></br></br>
    <label> Lastname</label> <input type="text" name="lname" value="<?php echo $row['lname'];?>"></br></br>
    <label> Email</label> <input type="text" name="email" value="<?php echo $row['email'];?>"></br></br>
    <label> Password</label> <input type="text" name="password" value="<?php echo $row['password'];?>"></br></br>
    <label>Select Language </label>
    <input type="radio" name="gender" value="male"
    <?php
    if($row['gender']=="male"){
        echo "checked";
    }
    ?>
    >male
    <input type="radio" name="gender" value="female"
    <?php
    if($row['gender']=="female"){
        echo "checked";
    }
    ?>
    >female</br></br>
   <label> Select city <label>
    <select name= "city"> 
      <option value="nagda">select</option>
      <option value = "nagda"
      <?php
      if($row['city']=="nagda"){
        echo "selected";
      }
      ?>
      >nagda</option>
        <option value="ujjain"
        <?php
        if($row['city']=="ujjain"){
            echo "selected";
        }
        ?>
        >ujjain</option>
        <option value="ratlam"
        <?php
        if($row['city']=="ratlam"){
            echo "selected";
        }
        ?>
        >ratlam</option>
    </Select></br></br>
    <label> Select language</label>
    <input type="checkbox" name="language[]" value="english"
    <?php
    if(in_array("english",$lang1)){
        echo "checked";
    }
    ?>
    >english
    <input type="checkbox" name="language[]" value="fench"
    <?php
    if(in_array("fench",$lang1)){
        echo "checked";
    }
    ?>
    >fench 
    <input type="checkbox" name="language[]" value="spanish"
    <?php
     if(in_array("spanish",$lang1)){
        echo "checked";
     }
    ?>
    >spanish</br></br>
   <input type="submit" name="edit" value="edit">
</form>                    
</body>
</html>
<?php
include("conn.php");
if($_POST['edit']){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city  = $_POST['city'];
    $language = $_POST['language'];
    $lang1 = implode(",",$language);
    //$sql = "INSERT INTO `form2`(`id`, `fname`, `lname`, `email`, `password`, `gender`, `city`, `language`) VALUES (' ','$fname','$lname','$email','$password','$gender','$city','$language')";
    $sql = "UPDATE `form2` SET `id`='$id',`fname`='$fname',`lname`='$lname',`email`='$email',`password`='$password',`gender`='$gender',`city`='$city',`language`='$lang1' WHERE id='$id'";
    $data = mysqli_query($conn , $sql);
    if($data){
        echo "record updated";
    }
    else{
        echo "record not updated";
    }

}
?>
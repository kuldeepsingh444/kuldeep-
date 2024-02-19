<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form System</title>
</head>
<body>
<form action="" method="POST">
    <label> FirstName</label> <input type="text" name="fname" value=""></br></br>
    <label> Lastname</label> <input type="text" name="lname" value=""></br></br>
    <label> Email</label> <input type="text" name="email" value=""></br></br>
    <label> Password</label> <input type="text" name="password" value=""></br></br>
    <label>Select Language </label>
    <input type="radio" name="gender" value="male">male
    <input type="radio" name="gender" value="female">female</br></br>
   <label> Select city <label>
    <select name= "city"> 
      <option>select</option>
      <option>nagda</option>
        <option>ujjain</option>
        <option>ratlam</option>
    </Select></br></br>
    <label> Select language</label>
    <input type="checkbox" name="language[]" value="english">english
    <input type="checkbox" name="language[]" value="fench">fench 
    <input type="checkbox" name="language[]" value="spanish">spanish</br></br>
   <input type="submit" name="submit" value="submit">
</form>                    
</body>
</html>
<?php
include("conn.php");
if($_POST['submit']){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city  = $_POST['city'];
    $language = $_POST['language'];
    $lang = implode(",",$language);
    $sql = "INSERT INTO `form2`(`id`, `fname`, `lname`, `email`, `password`, `gender`, `city`, `language`) VALUES (' ','$fname','$lname','$email','$password','$gender','$city','$lang')";
    $data = mysqli_query($conn ,$sql);
    if($data){
        echo "record inserted";
    }
    else{
        echo "record not inserted";
    }

}
?>
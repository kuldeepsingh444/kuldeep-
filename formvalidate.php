<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Form validation</title>
</head>
<body>
    <form action="" method="POST">
    <h1> Form Validation</h1>
    <label>Firstname</label>  <input type="text" name="fname" value="" required></br></br>
    <label>Lastname</label>   <input type="text" name="lname" value="" required></br></br>
    <label>Email</label>      <input type="text" name="email" value="" required></br></br>
    <label>pasword </label>   <input type="text" name="password" vaule="" required></br></br>
    <label> Selecrt gender</label>
    <input type="radio" name="gender" value="male">male
    <input type="radio" name="gender" value="female">female
</br></br>
    <label>Select city</label>
    <select name="city" required>
        <option value=""> select</option>
        <option> nagda</option>
        <option> ratlam</option>
        <option> ujjain</option>
    </select> </br></br>
    <label>Select langauge</label>
   <input type="checkbox" name="language[]" value="english">english
   <input type="checkbox" name="language[]" value="fench">fench
   <input type="checkbox" name="language[]" value="spanish">spanish
</br></br>
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
    //$lang = implode(",",$language);

   if($fname !="" && $lname !="" && $email !="" && $password !="" && $gender !="" && $city !="" && $language !=""){

    $sql = "INSERT INTO `form2`(`id`, `fname`, `lname`, `email`, `password`, `gender`, `city`, `language`) VALUES (' ','$fname','$lname','$email','$password','$gender','$city','$language')";
    $data = mysqli_query($conn ,$sql);
    if($data){
      echo "record inserted";
    }
    else{
        echo "record not inserted";
    }
}
else{
    echo"<script> alert('fill the form first')</script>";
    //echo "please fill the form";
}
}
?>
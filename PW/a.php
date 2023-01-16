<?php
    
    $host="localhost"; 
    $username="root"; 
    $pass="";
    $db_name="REGISTRATION"; 
    $tb_name="STUDENT";


    $conn = mysqli_connect("$host", "$username")or die("cannot connect"); 
    mysqli_select_db($conn,"$db_name")or die("cannot select DB");

    $usn=$_POST['USN'];
    $email=$_POST['email']; 
    $sem=$_POST['sem']; 
    $pass =$_POST['password'];
    
    $sql1="INSERT INTO REGISTRATION.STUDENT(USN,EMAIL_ID,SEM,PASS)VALUES ('$usn','$email','$sem',MD5('$pass'))";
    // $sql1="INSERT INTO REGISTRATION.STUDENT(USN,EMAIL_ID,SEM,PASS)VALUES ('1BM19CS158','$email','7',MD5('kejwqhfjh'))";
    $result3=mysqli_query($conn,$sql1);
    if($sem=='1st sem')
    header("location:sem1.php");
    elseif($sem=='3rd sem')
    header("location:sem3.php");
    elseif($sem=='5th sem')
    header("location:sem5.php");
    elseif($sem=='7th sem')
    header("location:sem7.php");

    mysqli_close($con);
?>


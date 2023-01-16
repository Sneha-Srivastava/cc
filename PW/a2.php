<?php
    $host="localhost"; 
    $username="root"; 
    $pass="";
    $db_name="REGISTRATION"; 
    $conn = mysqli_connect("$host", "$username")or die("cannot connect"); 
    mysqli_select_db($conn,"$db_name")or die("cannot select DB");
        if($_POST['sb']=='SUBMIT')
        {
            $sql="INSERT INTO REGISTRATION.FINAL_LIST(USN,SEM) SELECT USN,SEM FROM REGISTRATION.STUDENT WHERE STUDENT_ID=(SELECT MAX(STUDENT_ID) FROM REGISTRATION.STUDENT)"; 
            $result=mysqli_query($conn,$sql); 
        } 
        mysqli_close($conn);
        header("location:welcome1.php");
?>
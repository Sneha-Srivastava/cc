<?php
    $host="localhost"; 
    $username="root"; 
    $pass="";
    $db_name="REGISTRATION"; 
    $conn = mysqli_connect("$host", "$username")or die("cannot connect"); 
    mysqli_select_db($conn,"$db_name")or die("cannot select DB");
    $c1=$_POST['electives1cn'];
    $c2=$_POST['electives2cn'];
    $c3=$_POST['electives3cn'];
    $c4=",";
    $a=array();
    array_push($a,$c1,$c4,$c2,$c4,$c3);
    $b=implode("  ",$a);
    print_r($b);
    if($_POST['sb']=='SUBMIT')
    {    
        $sql1="INSERT INTO REGISTRATION.ELECTIVES_LIST(USN,SEM) SELECT USN,SEM FROM REGISTRATION.STUDENT WHERE STUDENT_ID=(SELECT MAX(STUDENT_ID) FROM REGISTRATION.STUDENT)";
        $sql3="INSERT INTO REGISTRATION.ELECTIVES(COURSE_NAME) VALUES ('$b')";
        $sql4="INSERT INTO REGISTRATION.REGISTERED_LIST(USN,SEM,COURSE_NAME) SELECT USN,SEM,COURSE_NAME FROM REGISTRATION.ELECTIVES_LIST INNER JOIN REGISTRATION.ELECTIVES ON REGISTRATION.ELECTIVES_LIST.ID=REGISTRATION.ELECTIVES.ID"; 
        $sql5="INSERT INTO REGISTRATION.FINAL_LIST(USN,SEM,ELECTIVE_CN) SELECT USN,SEM,COURSE_NAME FROM REGISTRATION.REGISTERED_LIST WHERE ID=(SELECT MAX(ID) FROM REGISTRATION.REGISTERED_LIST)";
        $result=mysqli_query($conn,$sql1);    
        $result3=mysqli_query($conn,$sql3);
        $result4=mysqli_query($conn,$sql4);
        $result5=mysqli_query($conn,$sql5);
        header("location:welcome1.php");
    }   
    mysqli_close($conn);
?>


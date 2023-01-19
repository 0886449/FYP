<?php
 
 session_start();
 include "dataconnection.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $name=$_POST['username'];
    //$pass=$_POST['password'];
    $email=$_POST['email'];
    $pnumber=$_POST['phone_number'];
    //$gender=$_POST['gender'];
    
    $select= "select * from users where id='$id'";
    $query = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($query);
    $res = $row['id'];
    if($res === $id)
    {
   
       $update = "update users set username='$name',email='$email',phone_number='$pnumber' where id='$id'";
       $sql2=mysqli_query($connect,$update);
        if($sql2)
        { 
            echo "<script>alert('Successfully!')</script>";
            /*Successful*/
            header( "refresh:0.5; url=index1.php" );

        }
        else
        {
            /*sorry your profile is not update*/
            header('location:myprofile.php');
        }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:index1.php');
    }
 }
?>
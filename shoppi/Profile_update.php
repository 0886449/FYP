<?php
 
 session_start();
 include "dataconnection.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $pnumber=$_POST['phone_number'];
    $gender=$_POST['gender'];
    
    $select= "select * from users where id='$id'";
    $query = mysqli_query($connect,$select);
    $row = mysqli_fetch_assoc($query);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update users set username='$name',password='$pass',email='$email',phone_number='$pnumber',gender='$gender' where id='$id'";
       $sql2=mysqli_query($connect,$update);
        if($sql2)
        { 
            /*Successful*/
            header('location:inde.php');
        }
        else
        {
            /*sorry your profile is not update*/
            header('location:Myprofile.php');
        }
        }
        else
        {
            /*sorry your id is not match*/
            header('location:Myprofile.php');
        }
 }
?>
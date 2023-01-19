<?php
 
 session_start();
 include "dataconnection.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $name=$_POST['username'];
    $email=$_POST['email'];
    $pnumber=$_POST['phone_number'];
    
    $select= "select * from admin where id='$id'";
    $query = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($query);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update admin set username='$name', email='$email',phone_number='$pnumber' where id='$id'";
       $sql2=mysqli_query($connect,$update);
        if($sql2)
        { 
            echo "<script>alert('Successfully!')</script>";
            /*Successful*/
			echo "<script>window.location='menu.php'</script>";
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
        header('location:menu.php');
    }
 }
?>
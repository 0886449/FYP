<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
    .mySlides {display:none}
    .w3-tag, .fa {cursor:pointer}
    .w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
    </style>
    <title>My profile</title>

</head>
<body>
<?php
    require("header.php");

    include("dataconnection.php");

    session_start();

    $id=$_SESSION['id'];
    $query=mysqli_query($connect,"SELECT * FROM users where id='$id'");
    $row=mysqli_fetch_array($query);
  ?>
    <div class="container"> 
        <div class="card">
            <form action="Profile_update.php" method="post"> 
                <div class="info"> 
                    <span>My Profile</span>
                    <button id="savebutton" name="edit">edit</button>
                </div> 

                    <div class="forms"> 
                        <div class="inputs"><span>Name</span> 
                        <input type="text" name="username" size="" value="<?php echo $row['username']; ?>">
                        </div> 
                        <div class="inputs"> <span>Email</span> 
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[com]">
                        </div> 
                        <div class="inputs"> <span>No.Phone</span> 
                        <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" pattern="[0][1][0-9][0-9]{7,8}">
                        </div> 
                            <div class=""> <span></span> 
                        </div> 
                    </div> 
            </form>
        </div>
    </div>
</body>
</html>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    *{
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }
    .container
    {
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        background-color:#eee
    }
    .card
    {
        width:350px;
        height:300px;
        background-color:#fff;
        box-shadow:0px 15px 30px rgba(0,0,0,0.1);
        border-radius:10px;
        overflow:hidden
    }
    
    .card .info
    {
        padding:15px;
        display:flex;
        justify-content:space-between;
        border-bottom:1px solid #e1dede;
        background-color:#e5e5e5
    }
    .card .info button{
        height:30px;
        width:80px;
        border:none;
        color:#fff;
        border-radius:4px;
        background-color:#000;
        cursor:pointer;
        text-transform:uppercase
    }
    .card .forms{
        padding:15px
    }
    .card .inputs{
        display:flex;
        flex-direction:column;
        margin-bottom:10px
    }
    .card .inputs span
    {
        font-size:12px
    }
    .card .inputs input
    {
        height:40px;
        padding:0px 10px;
        font-size:17px;
        box-shadow:none;
        outline:none
    }
    .card .inputs input[type="text"][readonly]
    {
        border: 2px solid rgba(0,0,0,0)
    }
</style>

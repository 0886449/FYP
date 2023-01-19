<?php include("dataconnection.php");?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="design.css" type="text/css" rel="stylesheet" />

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<?php
    session_start();
    $id = $_SESSION['id'];
    $query=mysqli_query($connect,"SELECT * FROM admin where id='$id'");
    $row=mysqli_fetch_array($query);
?>
<form action="Profile_update.php" method="post">

<h2 style="text-align:center">My Profile</h2>

<div class="card">
  <img src="../images/admin.png" alt="admin" style="width:100%">
  <h1></h1>
  <p class="title">Admin</p>
  <p></p>
  <div style="margin: 24px 0;">
    <p><label>Name :</label><input type="text" name="username" size="" value="<?php echo $row['username']; ?>">
    <p><label>Email :</label> <input type="email" name="email" value="<?php echo $row['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[com]">
    <p><label>No.Phone :</label> <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" pattern="[0][1][0-9][0-9]{7,8}">
  </div>
  <p><button name="edit">Save</button></p>
</div>
</form>
</body>
</html>
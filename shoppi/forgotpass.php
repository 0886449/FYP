
<?php include("dataconnection.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="fotgotpassp.php" method="POST">
   
<label class="label_txt">Username or Email </label>
    <input type="text" name="login_var" value="" class="form-control" required>
    <button type="submit" name="subforgot" class="btn btn-primary btn-group-lg form_btn">Send Link </button>
</form>

</body>
</html>
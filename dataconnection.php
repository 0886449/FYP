<?php

$connect = mysqli_connect("localhost","root","","pos");

if($connect)
{
  echo("Connect successfully!");
}
else
{
    echo "Failed ";
}

?>

<?php
define ("HOSTNAME" , "localhost");
define ("USERNAME" , "root");
define ("PASSWORD" , "");
define ("DATABASE" , "crud_operations");
$con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if(!$con)
{
    die("connection failed");
}


?>
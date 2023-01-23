<?php
$connect = mysqli_connect("db", "user", "password", "appDB");
if ( mysqli_connect_error() ){
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
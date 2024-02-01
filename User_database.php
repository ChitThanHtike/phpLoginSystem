<?php
$conn = mysqli_connect('localhost', 'root', '', 'user_data');// user_data is database name

if(!$conn){
    echo "Connection fail....".mysqli_connect_error();
}
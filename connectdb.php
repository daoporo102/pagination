<?php
function connect()
{
    $localhost = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'pagination';

    $conn = mysqli_connect($localhost, $username, $pass, $dbname);

    return $conn;
}

<?php

$con = mysqli_connect("localhost", "root", "", "nordstrom");


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
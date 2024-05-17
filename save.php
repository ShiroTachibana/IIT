<?php

include "./db_conn.php";

if(isset ($_POST['fname'])){
    $fname = $_POST['fname'];
    $sql = "INSERT INTO iitportal(FullName) VALUES(?)";
   
}
if(isset ($_POST['username'])){
    $fname = $_POST['username'];
    $sql = "INSERT INTO iitportal(Username) VALUES(?)";
}  
if(isset ($_POST['Password'])){
    $fname = $_POST['password'];
    $sql = "INSERT INTO iitportal(Password) VALUES(?)";
   
}
if(isset ($_POST['idnum'])){
    $fname = $_POST['idnum'];
    $sql = "INSERT INTO iitportal(ID_NUMBER) VALUES(?)";
}

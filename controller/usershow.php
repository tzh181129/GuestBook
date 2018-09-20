<?php
include_once '../includes/user.php';
header("content-type:application/json");
session_start();
$dname=$_SESSION['loginname'];
$dbhelper = new User();
$users = $dbhelper->getUserByName($dname);
echo  json_encode($users);
?>
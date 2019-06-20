<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";
require_once "src/Implemenation/UserImplementation.php";
$userImplementation = new UserImplementation();
session_start();

if(isset($_SESSION['login_user'])){

    $user_logged = $_SESSION['login_user'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>List Polls</title>
</head>
<body>
<?php include "nav.php"; ?>
<div class="container">

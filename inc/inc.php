<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";
require_once "src/Implemenation/UserImplementation.php";
require_once "src/Implemenation/PollImplementation.php";
require_once "src/Implemenation/VoteImplementation.php";
$userImplementation = new UserImplementation();
$pollImplementation = new PollImplementation();
$voteImplementation = new VoteImplementation();
session_start();

if(isset($_SESSION['login_user'])){

    $user_logged = $_SESSION['login_user'];
}
?>
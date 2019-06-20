<?php
// create_user.php <name>
require_once "bootstrap.php";


$newUserEmail = $_POST["email"];
$newUserPassword = $_POST["password"];

$existinguser = $entityManager->getRepository('User')->findOneBy(array('email' => $newUserEmail));

if(!$existinguser){
    $user = new User();
    $user->setEmail($newUserEmail);
    $user->setPassword($newUserPassword);
    $user->setIsAdmin(false);

    $entityManager->persist($user);
    $entityManager->flush();
    header("location: /login.php?err=2");
}
else{
    header("location: /register.php?err=1");
}



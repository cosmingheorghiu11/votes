<?php


class UserImplementation{

    public function show($id)
    {
        include "bootstrap.php";
        $user = $entityManager->getRepository('User')->findOneBy(array('id' => $id));
        return $user;
    }

    public function create($email, $password)
    {
        include "bootstrap.php";

        $existinguser = $entityManager->getRepository('User')->findOneBy(array('email' => $email));

        if(!$existinguser){
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setIsAdmin(false);

            $entityManager->persist($user);
            $entityManager->flush();
            header("location: /login.php?err=2");
        }
        else{
            header("location: /register.php?err=1");
        }
    }

    public function test()
    {
        include "bootstrap.php";
        echo "test";
    }
}
<?php



class UserImplementation{

    private $userRepository;
    private $em;


    public function __construct()
    {
        include "bootstrap.php";
        $this->userRepository = $entityManager->getRepository('User');
        $this->em = $entityManager;
    }


    public function create($email, $password)
    {
        $existinguser = $this->userRepository->findOneBy(array('email' => $email));

        if(!$existinguser){
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setIsAdmin(false);

            $this->em->persist($user);
            $this->em->flush();
            header("location: /login.php?msg=2");
        }
        else{
            header("location: /register.php?msg=1");
        }
    }

    public function login($email, $password)
    {
        $user = $this->userRepository->findOneBy(array('email' => $email, 'password' => sha1($password)));


        if($user) {
            $_SESSION['login_user'] = $user;

            header("location: /");
        }else {
            header("location: login.php?msg=1"); //err = 1 : Wrong login details
            //$error = "Your Login Name or Password is invalid";
        }
    }

}
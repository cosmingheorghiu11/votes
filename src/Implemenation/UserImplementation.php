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

    public function listAll()
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        if($_SESSION['login_user']->getIsAdmin())
        {
            $users = $this->userRepository->findAll();
            return $users;
        }
        else
        {
            header("location: error.php?err=1"); //You are not an admin
        }


    }

    public function listOne($id)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $user = $this->userRepository->findOneBy(array('id' => $id));
        if($_SESSION['login_user'] == $user || $_SESSION['login_user']->getIsAdmin())
        {
            return $user;
        }
        else
        {
            header("location: error.php?err=3"); //You can only see your own votes
        }



    }

}
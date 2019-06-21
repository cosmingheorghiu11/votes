<?php

class PollImplementation{

    private $pollRepository;
    private $userRepository;
    private $voteRepository;
    private $voteImplementation;
    private $em;

    public function __construct()
    {
        include "bootstrap.php";
        require_once "src/Implemenation/UserImplementation.php";
        require_once "src/Implemenation/VoteImplementation.php";
        $this->pollRepository = $entityManager->getRepository('Poll');
        $this->userRepository = $entityManager->getRepository('User');
        $this->voteRepository = $entityManager->getRepository('Vote');
        $this->voteImplementation = new VoteImplementation();
        $this->em = $entityManager;
    }

    public function create($name, $description)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        if($_SESSION['login_user']->getIsAdmin())
        {
            $poll = new Poll();
            $poll->setName($name);
            $poll->setDescription($description);

            $this->em->persist($poll);
            $this->em->flush();

            header("location: poll.php?id=" . $poll->getId());
        }
        else
        {
            header("location: error.php?err=1");
        }
    }

    public function edit($id, $name, $description)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        if($_SESSION['login_user']->getIsAdmin())
        {
            $poll = $this->pollRepository->findOneBy(array('id' => $id));
            $poll->setName($name);
            $poll->setDescription($description);

            $this->em->persist($poll);
            $this->em->flush();

            header("location: poll.php?id=" . $id);
        }
        else
        {
            header("location: error.php?err=1");
        }
    }

    public function delete($id)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        if($_SESSION['login_user']->getIsAdmin())
        {
            $poll = $this->pollRepository->findOneBy(array('id' => $id));
            $votes = $this->voteRepository->findby(array('poll' => $poll));

            //delete votes before poll
            foreach($votes as $vote){
                $this->voteImplementation->delete($vote->getId());
            }
            $this->em->remove($poll);
            $this->em->flush();

            header("location: polls.php");
        }
        else
        {
            header("location: error.php?err=1");
        }
    }

    public function listAll()
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $polls = $this->pollRepository->findAll();

        return $polls;
    }

    public function listOne($id)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $poll = $this->pollRepository->findOneBy(array('id' => $id));

        return $poll;
    }

    public function listByUserId($user_id)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $polls=[];
        $user = $this->userRepository->findBy(array('id' => $user_id));
        $votes = $this->voteRepository->findBy(array('user' => $user));

        foreach ($votes as $vote){
            //echo $vote->getPoll()->getName();
            array_push($polls, $vote->getPoll());
        }

        return $polls;


    }


}
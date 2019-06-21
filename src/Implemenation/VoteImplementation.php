<?php

class VoteImplementation{

    private $voteRepository;
    private $pollRepository;
    private $em;

    public function __construct()
    {
        include "bootstrap.php";
        $this->voteRepository = $entityManager->getRepository('Vote');
        $this->pollRepository = $entityManager->getRepository('Poll');
        $this->em = $entityManager;
    }

    public function create($poll_id, $choice)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        if(!$_SESSION['login_user']->getIsAdmin())
        {
            $poll = $this->pollRepository->findOneBy(array('id' => $poll_id));
            $vote = new Vote();
            $vote->setChoice($choice);
            $vote->setPoll($poll);
            $vote->setUser($_SESSION['login_user']);

            $this->em->merge($vote);
            $this->em->flush();

            header("location: poll.php?id=" . $poll_id);
        }
        else
        {
            header("location: error.php?err=5"); //Admins are unable to vote
        }
    }

    public function edit($poll_id, $choice)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $poll = $this->pollRepository->findOneBy(array('id' => $poll_id));
        $vote = $this->voteRepository->findOneBy(array('poll' => $poll, 'user' => $_SESSION['login_user']));
        $vote->setChoice($choice);

        $this->em->persist($vote);
        $this->em->flush();

        header("location: poll.php?id=" . $poll_id);
    }

    public function delete($id)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $vote = $this->voteRepository->findOneBy(array('id' => $id));
        $poll_id = $vote->getPoll()->getId();

        if($_SESSION['login_user']->getId() == $vote->getUser()->getId() || $_SESSION['login_user']->getIsAdmin())
        {
            $this->em->remove($vote);
            $this->em->flush();
            header("location: poll.php?id=" . $poll_id);
        }
        else
        {
            header("location: error.php?err=2"); //You can only delete your own votes
        }
    }

    public function listAll()
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $votes = $this->voteRepository->findAll();

        return $votes;
    }

    public function listByPoll($poll)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $votes  = $this->voteRepository->findBy(array('poll' => $poll));

        return $votes;
    }


    public function listByPollChoice($choice, $poll)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $votes = $this->voteRepository->findBy(array('choice' => $choice, 'poll' => $poll));

        return $votes;
    }

    public function currentUserByPoll($poll)
    {
        if(!isset($_SESSION['login_user']))
        {
            header("location: error.php?err=4"); //You are not logged in
            return 0;
        }
        $vote = $this->voteRepository->findOneBy(array('user' => $_SESSION['login_user'], 'poll' => $poll));

        return $vote;
    }

}
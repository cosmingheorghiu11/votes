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
        $poll = $this->pollRepository->findOneBy(array('id' => $poll_id));
        $vote = new Vote();
        $vote->setChoice($choice);
        $vote->setPoll($poll);
        $vote->setUser($_SESSION['login_user']);

        $this->em->merge($vote);
        $this->em->flush();

        header("location: poll.php?id=" . $poll_id);
    }

    public function listByPollChoice($choice, $poll)
    {
        $votes = $this->voteRepository->findBy(array('choice' => $choice, 'poll' => $poll));

        return $votes;
    }

    public function currentUserByPoll($poll)
    {
        $vote = $this->voteRepository->findOneBy(array('user' => $_SESSION['login_user'], 'poll' => $poll));

        return $vote;
    }

}
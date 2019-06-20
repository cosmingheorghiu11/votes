<?php

class PollImplementation{

    private $pollRepository;
    private $userRepository;
    private $voteRepository;
    private $em;

    public function __construct()
    {
        include "bootstrap.php";
        $this->pollRepository = $entityManager->getRepository('Poll');
        $this->userRepository = $entityManager->getRepository('User');
        $this->voteRepository = $entityManager->getRepository('Vote');
        $this->em = $entityManager;
    }

    public function create($name, $description)
    {
        //if admin...

        $poll = new Poll();
        $poll->setName($name);
        $poll->setDescription($description);

        $this->em->persist($poll);
        $this->em->flush();

        header("location: /");
    }

    public function listAll()
    {

        $polls = $this->pollRepository->findAll();

        return $polls;
    }

    public function listOne($id)
    {
        $poll = $this->pollRepository->findOneBy(array('id' => $id));

        return $poll;
    }

    public function listByUserId($user_id)
    {
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
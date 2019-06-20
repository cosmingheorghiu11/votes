<?php
// create_vote.php
require_once "bootstrap.php";

session_start();
$pollRepository = $entityManager->getRepository('Poll');
$poll = $pollRepository->findOneBy(array('id' => $_GET["poll_id"]));

$newVoteChoice = $_POST['vote'];
$newVotePoll = $poll;
$newVoteUser = $_SESSION['login_user'];

$vote = new Vote();
$vote->setChoice($newVoteChoice);
$vote->setPoll($newVotePoll);
$vote->setUser($newVoteUser);


$entityManager->merge($vote);
$entityManager->flush();

header("location: poll.php?id=" . $poll->getId());
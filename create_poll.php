<?php
// create_poll.php <name>
require_once "bootstrap.php";

$newPollName = $argv[1];
$newPollDescription = $argv[2];

$poll = new Poll();
$poll->setName($newPollName);
$poll->setDescription($newPollDescription);

$entityManager->persist($poll);
$entityManager->flush();

echo "Created Product with ID " . $poll->getId() . "\n";
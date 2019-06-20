<?php include "inc/head.php"; ?>
<?php
$pollRepository = $entityManager->getRepository('Poll');
$poll = $pollRepository->findOneBy(array('id' => $_GET["id"]));

$voteRepository = $entityManager->getRepository('Vote');
$votesYes = $voteRepository->findBy(array('poll' => $poll, 'choice' => 'yes'));
$votesNo = $voteRepository->findBy(array('poll' => $poll, 'choice' => 'no'));

$currentUserVote = $voteRepository->findOneBy(array('user' => $user_logged, 'poll' => $poll));

?>
<?php if($currentUserVote){?>
        <h1 class="text-center">Vote for: <?php echo $poll->getName();?></h1>
        <h2 class="text-center">Description: <?php echo $poll->getDescription(); ?></h2>
        <p class="text-center">Yes Votes: <?php echo count($votesYes); ?></p>
        <p class="text-center">No Votes: <?php echo count($votesNo); ?></p>
        <p class="text-center">Your Vote: <?php echo $currentUserVote->getChoice(); ?></p>

<?php } else {?>
    <form method="post" action="create_vote.php?poll_id=<?php echo $poll->getId() ?>">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="option1" value="yes">
            <label class="form-check-label" for="option1">
                Yes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="option2" value="no">
            <label class="form-check-label" for="option2">
                No
            </label>
        </div>
        <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
    </form>

<?php } ?>

<?php include "inc/bott.php"; ?>













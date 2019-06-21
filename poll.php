<?php include "inc/head.php";
$poll = $pollImplementation->listOne($_GET['id']);
$voteRepository = $entityManager->getRepository('Vote');
$votesYes = $voteImplementation->listByPollChoice('yes', $poll);
$votesNo = $voteImplementation->listByPollChoice('no', $poll);
$currentUserVote = $voteImplementation->currentUserByPoll($poll);



?>
<div class="text-center">
    <h1 class="text-center">Vote for: <?php echo $poll->getName();?></h1>
    <h2 class="text-center">Description: <?php echo $poll->getDescription(); ?></h2>
    <p class="text-center">Yes Votes: <?php echo count($votesYes); ?></p>
    <p class="text-center">No Votes: <?php echo count($votesNo); ?></p>
    <?php if(!empty($votesNo) || !empty($votesYes)){ ?>
        <div class="container">
            <canvas id="myChart"></canvas>
        </div>
    <?php } ?>

<?php if(!$_SESSION['login_user']->getIsAdmin()){?>
<?php if($currentUserVote){?>
    <p class="text-center">Your Vote: <?php echo $currentUserVote->getChoice(); ?></p>
    <form method="post" action="edit_vote.php?poll_id=<?php echo $poll->getId(); ?>">
        <div class="form-check text-center">
            <input class="form-check-input" type="radio" name="vote" id="option1" value="yes" required>
            <label class="form-check-label" for="option1">
                Yes
            </label>
        </div>
        <div class="form-check text-center">
            <input class="form-check-input" type="radio" name="vote" id="option2" value="no" required>
            <label class="form-check-label" for="option2">
                No
            </label>
        </div>
        <div class="text-center">
            <input class=" btn btn-primary" id="edit" type="submit" value="Revote">
        </div>
    </form>
    <a href="/delete_vote.php?id=<?php echo $currentUserVote->getId(); ?>" class="btn btn-outline-danger" role="button">Delete Vote</a>
</div>

<?php } else {?>
    <form method="post" action="create_vote.php?poll_id=<?php echo $poll->getId(); ?>">
        <div class="form-check text-center">
            <input class="form-check-input" type="radio" name="vote" id="option1" value="yes" required>
            <label class="form-check-label" for="option1">
                Yes
            </label>
        </div>
        <div class="form-check text-center">
            <input class="form-check-input" type="radio" name="vote" id="option2" value="no" required>
            <label class="form-check-label" for="option2">
                No
            </label>
        </div>
        <div class="text-center">
           <input class="btn btn-primary text-uppercase" type="submit" value="Vote">
        </div>
    </form>


<?php }
}
else{?>
<a href="/delete_poll.php?id=<?php echo $_GET['id'];?>" class="btn btn-outline-danger" role="button">Delete Poll</a>
<?php }?>


<script>
    let myChart = document.getElementById('myChart').getContext('2d');

    let pieChart = new Chart(myChart, {
        type: 'pie',
        data: {
            labels:['Yes', 'No'],
            datasets:[{
                label:'Votes',
                data:[
                    <?php echo count($votesYes); ?> ,
                    <?php echo count($votesNo); ?>
                ],
                backgroundColor:[
                    '#ff6868',
                    '#7c68ff'
                ]
            }]
        },
        options: {}
    });
</script>
<?php include "inc/bott.php"; ?>
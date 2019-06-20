<?php include "inc/head.php";
$polls = $pollImplementation->listByUserId($_GET['id']);
?>



    <div class="container">
        <h3><?php echo $_SESSION['login_user']->getEmail() ?> voted for these polls:</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($polls as $poll) { ?>
                <tr>
                    <th scope="row"><?php echo $poll->getId();?></th>
                    <th scope="row"><a href="/poll.php?id=<?php echo $poll->getId();?>" ><?php echo $poll->getName();?></a></th>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

<?php include "inc/bott.php" ?>
<?php include "inc/head.php";
$polls = $pollImplementation->listAll();
?>



    <div class="container">


        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($polls as $poll) { ?>
                <tr>
                    <th scope="row"><a href="/poll.php?id=<?php echo $poll->getId();?>"><?php echo $poll->getName();?></a></th>
                    <th scope="row"><a href="/poll.php?id=<?php echo $poll->getId();?>" ><?php echo $poll->getDescription();?></a></th>

                    <?php if($_SESSION['login_user']->getIsAdmin()){?>
                        <th scope="row"><a href="/edit.php?id=<?php echo $poll->getId();?>" class="btn btn-outline-success" role="button">Edit</a>
                            <a href="/delete_poll.php?id=<?php echo $poll->getId();?>" class="btn btn-outline-danger" role="button">Delete</a>
                        </th>
                    <?php } ?>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

<?php include "inc/bott.php" ?>
<?php include "inc/head.php";
$users = $userImplementation->listAll();
?>

    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) { ?>
                <tr>
                    <th scope="row"><a href="/user.php?id=<?php echo $user->getId();?>" ><?php echo $user->getEmail();?></a></th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php include "inc/bott.php" ?>
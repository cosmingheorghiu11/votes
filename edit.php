
<?php include "inc/head.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Poll</h5>
                        <form class="form-signin" method="post" action="edit_poll.php?id=<?php  echo $_GET['id'] ?>" >
                            <div class="form-label-group">
                                <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $pollImplementation->listOne($_GET['id'])->getName()?>" required >
                                <label for="inputEmail">Poll Name</label>
                            </div>

                            <div class="form-label-group">
                                <input name="description" type="text" class="form-control" placeholder="Description" value="<?php echo $pollImplementation->listOne($_GET['id'])->getDescription()?>" required>
                                <label for="inputPassword">Description</label>
                            </div>
                            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "inc/bott.php"; ?>
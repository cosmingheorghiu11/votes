<?php include "inc/head.php"; ?>


    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Add Poll</h5>
                        <form class="form-signin" method="post" action="create_poll.php" >
                            <div class="form-label-group">
                                <input name="name" type="text" class="form-control" placeholder="Name" required autofocus>
                                <label for="inputEmail">Poll Name</label>
                            </div>

                            <div class="form-label-group">
                                <input name="description" type="text" class="form-control" placeholder="Description" required>
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
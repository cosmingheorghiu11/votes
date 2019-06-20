<?php include "inc/head.php"; ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userImplementation->login($_POST['email'], $_POST['password']);
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" method="post" action="" >
                        <div class="form-label-group">
                            <input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>
                        <?php if(isset($_GET['msg'])) {
                            if($_GET['msg'] == 1){?>
                            <div class="alert alert-danger" role="alert">
                                Wrong e-mail or password!
                            </div>
                        <?php } elseif ($_GET['msg'] == 2){?>
                            <div class="alert alert-success" role="alert">
                                Account created!
                            </div>
                            <?php }
                        }?>
                        <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "inc/bott.php"; ?>
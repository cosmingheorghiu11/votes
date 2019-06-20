<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="/">Polls </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Menu1 <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <?php
                    if(isset($_SESSION['login_user'])){?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" ><?php echo $user_logged->getEmail();?></a>
                        </li>
                    <li class="nav-item">
                        <a href="/logout.php" class="btn btn-primary nav-link" role="button">Logout</a>
                    </li>
                    <?php
                }
                else{
                ?>
                    <li class="nav-item">
                        <a href="/login.php" class="btn btn-outline-success nav-link" role="button">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register.php" class="btn btn-outline-success nav-link" role="button">Register</a>
                    </li>
                <?php } ?>
                </ul>
            </div>
    </nav>
</div>
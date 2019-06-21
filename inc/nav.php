<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="/">Polls </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if(isset($_SESSION['login_user'])){?>
                        <?php if($_SESSION['login_user']->getIsAdmin()){?>
                        <li class="nav-item">
                            <a href="add.php" class="btn btn-primary-success nav-link" role="button">Add Poll</a>
                        </li>
                            <?php }?>
                        <li class="nav-item">
                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $user_logged->getEmail();?>
                                </button>
                                <div class="dropdown-menu">
                                    <?php if($_SESSION['login_user']->getIsAdmin()){?>
                                        <a class="dropdown-item" href="users.php">User List</a>
                                    <?php }else { ?>
                                        <a class="dropdown-item" href="user.php?id=<?php echo $_SESSION['login_user']->getId()?>">My votes</a>
                                    <?php } ?>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
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
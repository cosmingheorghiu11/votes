<?php
include "inc/head.php";
echo "test" . $_SESSION['login_user']->getIsAdmin();

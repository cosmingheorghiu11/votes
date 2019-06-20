<?php
include "inc/inc.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $voteImplementation->create($_GET['poll_id'], $_POST['vote']);
}
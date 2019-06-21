<?php
include "inc/inc.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $voteImplementation->edit($_GET['poll_id'], $_POST['vote']);
}
<?php
include "inc/inc.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $pollImplementation->create($_POST['name'], $_POST['description']);
}
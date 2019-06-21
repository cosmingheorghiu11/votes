<?php include "inc/inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $pollImplementation->edit($_GET['id'], $_POST['name'], $_POST['description']);
}
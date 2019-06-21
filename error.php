<?php include "inc/head.php";?>

<h3>
<?php
switch ($_GET['err']) {
    case 1:
        echo "You are not an admin";
        break;
    case 2:
        echo "You can only delete your own votes!";
        break;
    case 3:
        echo "You can only see your own votes";
        break;
    case 4:
        echo "You are not logged in";
        break;
    case 5:
        echo "Admins are unable to vote";
        break;
}
?>
</h3>

<?php include "inc/bott.php";?>

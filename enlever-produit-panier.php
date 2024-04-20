<?php
session_start();

$id = $_GET['id'];

if (isset($_SESSION['panier'])) {
    $total_enlever = $_SESSION['panier'][3][$id][1];
    $_SESSION['panier'][1] -= $total_enlever;
    unset($_SESSION['panier'][3][$id]);
}

header("location: ../panier.php");
exit();
?>

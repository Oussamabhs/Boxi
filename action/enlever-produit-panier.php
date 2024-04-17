<?php
session_start()



$id = $_GET['id'];

echo $id ;
$_SESSION['panier'][1] -= $total_enlever; 
$total_enlever = $_SESSION['panier'][3][$id][1];
unset ($_SESSION['panier'][3][$id]);


header("location: ../panier.php")




?>
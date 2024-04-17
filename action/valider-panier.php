<?php
session_start();
include "../inc/function.php";
// //connexion bd

 $conn = connect();

 //id visiteur
 $visiteur=$_SESSION['id'];
 $total = $_SESSION['panier'][1];
 $date = date('y-m-d');

// // creation de panier
 $requette_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
// //execution requette panier

$resultat = $conn ->query($requette_panier);
$panier_id = $conn->lastInsertId();


$commandes = $_SESSION['panier'][3];

foreach($commandes as $commande){





// // ajouter commande

// //requette
$quantite = $commande[0];
$total= $commande[1];
$panier_id= $commande[4];

 $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES( '$quantite','$total','$panier_id','$date','$date','$id_produit')";
 
 
 // //execution requette


$resultat = $conn ->query($requette);


}
// supprimer le panier
$_SESSION['panier']= null ;

header('location: ../index.php');


?>
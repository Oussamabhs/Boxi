<?php
session_start();
include "../inc/function.php";
// //connexion bd
$conn = connect();

//id visiteur
$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('y-m-d');

// // création de panier
$requette_panier = "INSERT INTO panier(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
// //exécution requête panier
$resultat = $conn->query($requette_panier);
$panier_id = $conn->lastInsertId();

$commandes = $_SESSION['panier'][3];

foreach ($commandes as $commande) {
    // // ajouter commande
    // //requête
    $quantite = $commande[0];
    $total = $commande[1];
    $produit_id = $commande[3]; // L'ID du produit est à l'index 3
    $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$produit_id')";

    // //exécution requête
    $resultat = $conn->query($requette);
}

// supprimer le panier
$_SESSION['panier'] = null;

header('location: ../index.php');
?>

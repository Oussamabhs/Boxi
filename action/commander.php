<?php
session_start(); 
// // test user connectee


 if (!isset($_SESSION['nom'])){ //user nn connectee
     header('location:../connexion.php');
     exit();
 }

// //selectionner le produit avec leur id

 include "../inc/fuction.php";
// //connexion bd

 $conn = connect();


$visiteur = $_SESSION['id'];



// //var_dump($_post);
 $id_produit = $_POST['produit'] ;
 $quantite = $_POST['quantite'] ;


//  //requette

 $requette = "SELECT prix , nom FROM produits WHERE id = '$id_produit' ";

//  //execution requette

$resultat = $conn ->query($requette);

$produit = $resultat ->fetch();

$total = $quantite * $produit['prix'];

$date = date("y-m-d");
if (!isset($_SESSION['panier'])){// panier n'existe pas
    $_SESSION['panier'] =array( $visiteur , 0 , $date , array()); //creation de panier
}
$_SESSION['panier'][1] += $total ;
 $_SESSION['panier'][3][] = array($quantite , $total , $date , $id_produit , $produit['nom'] );






 
header('loocation: e_commerce/panier.php ')

?>
<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['nom'])) {
    header('location: ../connexion.php');
    exit();
}

// Inclure le fichier de fonctions
include "../inc/function.php";

// Connexion à la base de données
$conn = connect();

// Récupérer l'ID du visiteur
$visiteur = $_SESSION['id'];

// Récupérer les données du formulaire
$id_produit = isset($_POST['produit']) ? $_POST['produit'] : null;
$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : null;

// Vérifier si l'ID du produit et la quantité sont définis
if ($id_produit && $quantite) {
    // Requête pour sélectionner le produit
    $requette = "SELECT prix, nom FROM produits WHERE id = '$id_produit'";
    $resultat = $conn->query($requette);

    // Vérifier si la requête a réussi
    if ($resultat) {
        $produit = $resultat->fetch();
        // Vérifier si le produit existe
        if ($produit) {
            $total = $quantite * $produit['prix'];
            $date = date("y-m-d");
            // Initialiser le panier s'il n'existe pas déjà
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = array($visiteur, 0, $date, array());
            }
            // Mettre à jour le total du panier
            $_SESSION['panier'][1] += $total;
            // Ajouter le produit au panier
            $_SESSION['panier'][3][] = array($quantite, $total, $date, $id_produit, $produit['nom']);
        } else {
            // Gérer le cas où le produit est introuvable
        }
    } else {
        // Gérer le cas où la requête a échoué
    }
}

// Rediriger vers la page du panier
header('location: ../panier.php');
exit();
?>

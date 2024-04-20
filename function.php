<?php

function getallcategories() {
  // Connexion à la base de données
  $servername = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "e-shop";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
      // Définition du mode d'erreur de PDO sur Exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Création de la requête SQL pour récupérer toutes les catégories
      $query = "SELECT * FROM categories";

      // Exécution de la requête SQL
      $result = $conn->query($query);

      // Récupération de toutes les lignes de résultats
      $categories = $result->fetchAll();

      // Retourne les catégories récupérées
      return $categories;
  } catch(PDOException $e) {
      // Gestion des exceptions
      // Vous pouvez personnaliser cette gestion des erreurs selon vos besoins
      echo "Erreur lors de la récupération des catégories : " . $e->getMessage();
      // Vous pouvez choisir de retourner une valeur par défaut ou de générer une exception pour propager l'erreur
      // return []; // Retourner une valeur par défaut (tableau vide)
      // throw $e; // Propager l'exception pour une gestion plus globale
  }
}

  
  
  
  function getallproducts() {
  // cnx vers la bd
  $servername = "localhost" ;  
   $dbuser = "root" ;
   $dbpassword = "" ;
   $dbname = "e-shop" ;
   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  // creation de la requette
  $requette = "SELECT * FROM produits";
  // execution de la requette
  $resultat = $conn->query($requette);
  
  // resultat de la requette
  $produits = $resultat->fetchall();
  //var_dump($categories);
  return $produits;
  }
  
  function searchproduits($keywords){
    // cnx vers la bd
  $servername = "localhost" ;  
  $dbuser = "root" ;
  $dbpassword = "" ;
  $dbname = "e-shop" ;
  try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
   } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
   }
   
  // creation de la requette
   $requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%' ";
  // execution de la requette
  $resultat = $conn->query($requette);
  // resultat de la requette
  $produits = $resultat->fetchall();
  return $produits;
  
  }
  
  function getproduitbyId($id){
  // cnx vers la bd
  $servername = "localhost" ;  
   $dbuser = "root" ;
   $dbpassword = "" ;
   $dbname = "e-shop" ;
   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  // creation de la requette
  $requette = "SELECT * FROM produits WHERE id=$id";
  // execution de la requette
  $resultat = $conn->query($requette);
  // resultat de la requette
  $produit = $resultat->fetch();
  return $produit;
  }
  
   function Addvisiteur ($data){
  // cnx vers la bd
  $servername = "localhost" ;  
   $dbuser = "root" ;
   $dbpassword = "" ;
   $dbname = "e-shop" ;
   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    // creation de la requette
    $mphash = md5($data['mp']);  // hashage de mp
    $requette = "INSERT INTO visiteurs(nom, prenom ,email , mp , telephone ) VALUES  ('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."' ) ";
  // execution de la requette
  $resultat = $conn->query($requette);
  if ($resultat){
   return true; 
  }else{
   return false;
  }
  }
  
  function connectvisiteur($data){
  // cnx vers la bd
  $servername = "localhost" ;  
   $dbuser = "root" ;
   $dbpassword = "" ;
   $dbname = "e-shop" ;
   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    // creation de la requette
    $email = $data['email'];
    $mp = md5( $data['mp'] );
    $requette= "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";
    // execution de la requette
  $resultat = $conn->query($requette);
  // resultat de la requette
  $user = $resultat->fetch();
  
  return $user ;
  
  
  
  
  
  }
 


function connect() {
  $servername = "localhost" ;  
   $dbuser = "root" ;
   $dbpassword = "" ;
   $dbname = "e-shop" ;

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
      // Configuration de l'attribut PDO pour lancer une exception en cas d'erreur
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connexion réussie";
      return $conn; // Retourne l'objet PDO
  } catch(PDOException $e) {
      echo "Échec de la connexion : " . $e->getMessage();
  }
}

?>
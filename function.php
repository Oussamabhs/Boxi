<?php

function getallcategories (){
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
$requette = "SELECT * FROM categories";
// execution de la requette
$resultat = $conn->query($requette);

// resultat de la requette
$categories = $resultat->fetchall();
//var_dump($categories);
return $categories; 
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

?>
<?php
session_start();


//var_dump($_SESSION['panier']);
$total=0;
if (isset(  $_SESSION['panier'])){ 
$total = $_SESSION['panier'][1];
}

$categories = getallcategories();

if(!empty($_POST)){

     $produit = searchproduit($_POST['search']);
}else{
$produit = getALLproducts();
}
$commandes = array(); 
if (isset($_SESSION['panier'])){
    if ( count($_SESSION['panier'][3])>0){
            $commandes = $_SESSION['panier'][3];       
    }
}


?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include "inc/header.php";
     ?>

     <div class="row col-12 mt-4">
               <h1>panier utilisateur</h1> 
               <table class="table">
                  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Total</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>

  <?php   
                  foreach($commandes as $index=>$commande ){ 
  
                        print ' <tr>
                        <th scope="row">'.($index+1).'</th>
                        <td>'.$commande[5].'</td>
                        <td>'.$commande[0].'pieces</td>
                        <td>'.$commande[1].'DTT</td>
                        <td> <a href="action/enlever-produit-panier.php?id='.$index.'" class="btn btn-danger">supprimer</a></td>

                      </tr>';
                  }
  
  ?>
   
    
  </tbody>
</table>
<div class="text-mt-3">
  <h3>Total:<?php echo $total ?> DTT</h3>
  <hr/>
  <a href="action/valider-panier.php" class="btn btn-success" style="width:100px ">Valider</a>
</div>
               <BUtton class="btn btn-success" style="width:100px"  >VALIDER</BUtton> 

     </div>
     <?php
     include "inc/footer.php"

     ?>
    
</body>
</html>
<?php
session_start();



?>















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php if (isset($_SESSION['etat'])&& $_SESSION['etat']==0){

print '<div class="alert alert-danger">
compte non valide


</div>';


}      ?>






    <div class="col-12 ">
        <form class="d-flex" action="action/commander.php"method='POST'>
            <input type="hidden" name="produit">
            <input type="number" class="form-control" step="1" placeholder="Quntite du produit ...."><br>
            <button type="submit"<?php if(isset($_SESSION['etat'])&& $_SESSION['etat']==0 || !isset($_SESSION['etat']) ){echo "disabled";} ?> class="btn btn-primary">commander</button>


        </form>
    </div>
</body>

</html>
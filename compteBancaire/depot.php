<?php

session_start();

$idClient = $_SESSION["ID"];

require_once "includes/db.php";



if(isset($_POST["depot"])){
    $depot = $_POST["depot"];
    if($depot>0){
        $query = "UPDATE client SET solde = solde + $depot WHERE id = $idClient";
        $sth = $dbh->prepare($query);
        $sth->execute();
    }
    else{
        echo "<p>";
        ?>
        Vous devez saisir un montant positif
        <?php
        echo "</p>";
    }
}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dépot d'argent</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="client.php">Espace client</a>
        </nav>
    </header>
    <form method = "POST">
        <label for="depot">Saisir le montant du dépot</label>
        <input type="number" step = "0.1" id ="depot" name="depot" placeholder="€">
        <button type ="submit">Faire le dépot</button>
    </form>
    
</body>
</html>
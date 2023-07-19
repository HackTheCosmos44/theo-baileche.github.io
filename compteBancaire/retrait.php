<?php

session_start();

$idClient = $_SESSION["ID"];

require_once "includes/db.php";

$client = $_SESSION["ID"];
$query = "SELECT solde FROM client WHERE id = $client";
$sth = $dbh-> prepare($query);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
$solde = intval($row["solde"]);


if(isset($_POST["retrait"])){
    $retrait = $_POST["retrait"];
    if($retrait > 0){
        if ($retrait < $solde){
            $query = "UPDATE client SET solde = solde - $retrait WHERE id = $idClient";
            $sth = $dbh->prepare($query);
            $sth->execute();
        }
        else{
            echo "<p>";
            ?> Vous ne disposez pas de suffisament d'argent pour retirer ce montant
            <?php echo "</p>";
        }
    }
    else{
        echo "<p>"
        ?> Vous devez saisir un montant supérieur à zéro
        <?php echo "</p>";
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
        <label for="retrait">Saisir le montant du retrait</label>
        <input type="number" step = "0.1" id ="retrait" name="retrait" placeholder="€">
        <button type ="submit">Faire le retrait</button>
    </form>
    
</body>
</html>
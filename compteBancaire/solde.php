<?php
session_start();

require_once "includes/db.php";

$client = $_SESSION["ID"];
$query = "SELECT solde FROM client WHERE id = $client";
$sth = $dbh-> prepare($query);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
$solde = floatval($row["solde"]);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solde</title>
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

    <?php
        echo "<h1>"; ?>
        Vous avez <?= $solde ?> € sur votre compte
    <?php "</h1>"; ?>
    
</body>
</html>
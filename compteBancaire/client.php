<?php
session_start();



$client = $_SESSION["client"];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace client</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Se déconnecter</a>
        </nav>
        <?php
            echo "<h1>"; ?>
            Bienvenu 
        <?php 
            echo $client;
            echo "</h1>";
        ?>
    </header>
        <section>

            <button>
                <a href="solde.php">Consulter mon solde</a>
            </button>
            <button>
                <a href="depot.php">Déposer de l'argent</a>
            </button>
            <button>
                <a href="retrait.php">Retirer de l'argent</a>
            </button>
        </section>

    
</body>
</html>
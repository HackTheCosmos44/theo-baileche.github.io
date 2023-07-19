<?php

require_once "includes/db.php";

    if(isset($_POST["submit"])){
        $pseudo = $_POST["pseudo"];
        $pwd1 = $_POST["pwd1"];
        $pwd2 = $_POST["pwd2"];
        if(!empty($pseudo)){
            if(!empty($pwd1 && $pwd2) && $pwd1 === $pwd2){
                $query = "INSERT INTO client VALUES (NULL, :pseudo, :password, 0.)";
                $sth = $dbh -> prepare($query);
                $sth -> execute([
                    ':pseudo' => $pseudo,
                    // on hash le mot de passe pour qu'il ne soit pas en clair dans la bases de donnée
                    ':password' => password_hash($pwd1, PASSWORD_DEFAULT)
                ]);
                echo "<p>"; ?>
                Votre compte à bien été créé
                <?php echo "</p>"; ?>

                <meta http-equiv="refresh" content="5; URL=inscription.php" />

                <?php
            }
            else { echo "<p>"; ?>
            Vous devez renseigner deux mots de passe identiques
            <?php echo "</p>";
            }
        }       
        else {
            echo "<p>"; ?>
            Vous devez renseigner un pseudo
            <?php echo "</p>";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">
</head>
<header>
    <nav>
        <a href="index.php">Accueil</a>
    </nav>
</header>
<body>
    <form action="" method ="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" id ="pseudo" name = "pseudo" placeholder="Pseudo">
        <label for="pwd1">Mot de passe</label>
        <input type="password" id =" pwd1" name ="pwd1">
        <label for="pwd2">Confirmation du mot de passe</label>
        <input type="password" id ="pwd2" name ="pwd2">
        <button type="submit" name="submit">Créer mon compte</button>
    </form>
    
</body>
</html>
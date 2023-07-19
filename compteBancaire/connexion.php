<?php

session_start();

require_once "includes/db.php";

if (isset($_POST["connexion"])){
    $pseudo = $_POST["pseudo"];
    $pwd = $_POST["pwd"];
    if (!empty($pseudo && $pwd)){
        $query = "SELECT * FROM client WHERE pseudo = :pseudo";
        $sth = $dbh -> prepare($query);
        $sth ->execute([
            ':pseudo' => $pseudo
        ]);

        $row = $sth->fetch(PDO::FETCH_ASSOC);

        if ($row){ 
            $hash = $row["password"];   
            if(password_verify($pwd, $hash)){
                $_SESSION["ID"] = $row["id"];
                $_SESSION["client"] = $row["pseudo"];
                $_SESSION["solde"] = $row["solde"];
                header("Location:client.php");
                die;
            }
            else{
                echo "<p>"; ?>
                Votre pseudo ou votre mot de passe est incorect
                <?php echo "</p>";
            }
        }
        else{
            echo "<p>"; ?>
            Votre pseudo ou votre mot de passe est incorect
            <?php echo "</p>"; 
        }
    }
    else {
        echo "<p>"; ?>
        Vous devez renseigner un pseudo et un mot de passe
        <?php echo "</p>";
    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
        </nav>
    </header>

    <form method ="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" id ="pseudo" name ="pseudo" placeholder="pseudo">
        <label for="pwd">Mot de passe</label>
        <input type="password" id ="pwd" name ="pwd">
        <button type="submit" name ="connexion">Se connecter</button>
    </form>
    
</body>
</html>
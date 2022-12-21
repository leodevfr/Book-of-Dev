<?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "Nom de votre base de données";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if(isset($_POST['envoi'])){
    if(!empty($_POST['name']) and !empty($_POST['pass'])) {
        $name = htmlspecialchars($_POST['name']);
        $pass = sha1($_POST['pass']);

        // Création de la requête d'insertion
        $query = "INSERT INTO users (name, pass) VALUES (?, ?)";
        // Préparation de la requête
        $stmt = mysqli_prepare($conn, $query);
        // Liaison des paramètres
        mysqli_stmt_bind_param($stmt, "ss", $name, $pass);
        // Exécution de la requête
        mysqli_stmt_execute($stmt);
    }else{
        echo "Veuillez compléter les champs obligatoires.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormPhP</title>
</head>
<body>
    <form action="" method="POST" align="center">

    <input type="text" name="name" autocomplete="off">
    <br>
    <input type="password" name="pass" autocomplete="off">
    <br>
    <br>
    <input type="submit" name="envoi">
    
</body>
</html>
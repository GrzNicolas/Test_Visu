<?php
//include("include/connect.php");


?>


<!DOCTYPE html>

<html>
<head>
    <meta name="description" content="Tout sur les apparitions muettes de
la Banane Masquée dans le cinéma colombien des années 20 et 30." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" >
    <link href="css/list.css" rel="stylesheet" type="text/css" >


    <meta charset=utf-8" />
    <title>Trainingbook</title>




</head>
<header>

</header>

<section>

    <ul>
        <form action="login.php" method="post" > <!--action="../engine/login.php">-->
            <!--<form method="post" class="login" action="">-->
            <div>
                <label for="Nom">Nom</label>
                <input type="text" name="Nom" >
            </div><div>
                <label for="Prenom">Prenom</label>
                <input type="text" name="Prenom">
            </div><div>
                <label for="email">Email</label>
                <input type="email" name="email" class="validFormEmail" placeholder="adresse email" required>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="validFormPassword" placeholder="mot de passe" required>
            </div><div>
                <label for="Avatar">Avatar</label>
                <input type="file" name="Avatar" />
            </div>
            <div>
                <a href="login.php">   <input type="submit" name="submit" value="Créer un compte"></a>

            </div>
        </form>
    </ul>
</section>
<?php
include("include/connect.php");
if (isset($_POST['Nom']) and isset($_POST['Prenom']) ) {

    $query = "INSERT INTO `user` (`Iduser`, `Username`, `UserFirstname`, `Useremail`, `UserPasseword`, `UserPicture`, `UserDateEnregistrement`, `UserTime`, `UserFlag`, `UserRules`) VALUES (NULL,'".$_POST["Nom"]."', '".$_POST["Prenom"]."', '".$_POST["email"]."', '".$_POST['password']."', 'nigma.jpg', '2016-08-15', '19:00:00', '1', '0');";
    InsertUpdateDelete($query);


    //echo($id);
}

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
<form action="Main.php" method="post" class="login"> <!--action="../engine/login.php">-->
<!--<form method="post" class="login" action="">-->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" class="validFormEmail" placeholder="adresse email" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="validFormPassword" placeholder="mot de passe" required>
    </div>
    <div>
     <a href="Main.php">   <input type="submit" name="submit" value="Se connecter"></a>
        <a href="Register.php">Creer un compte</a>
    </div>
</form>
</ul>
</section>
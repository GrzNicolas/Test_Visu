<?php


$bdd = new PDO('mysql:host=localhost;dbname=bddcours;charset=utf8', 'root', '');

 

    function connexion()
    {
        $connexion = new PDO('mysql:host=localhost;dbname=test', "root", "");
        /*if($connexion)
        {
            echo('ok');
        }*/
        return $connexion;
    }

    function Select($requete)
    {
        $bdd = connexion();
        $resultat = $bdd->query($requete);
        deconnexion($bdd);
        return $resultat;
    }

    function InsertUpdateDelete($requete)
    {
        $bdd = connexion();
        $bdd->query($requete);
        deconnexion($bdd);
    }

    function deconnexion($connexion)
    {
        $connexion = null;
    }

?>
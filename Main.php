<?php
session_start();
include("include/connect.php");
//test commentaire

if (isset($_POST['password']) && isset($_POST['email'])) {
    $query = "SELECT idUser,UserRules from user where Useremail='" . $_POST['email'] . "' and UserPasseword = '" . $_POST['password'] . "' and UserFlag='1' ";
    //echo($query);
    $result = Select($query);
    foreach ($result as $Id) {
        $_SESSION["id"] = $Id['idUser'];
        $_SESSION["UserRules"] = $Id['UserRules'];
    }
    //echo($id);
}


?>


    <!DOCTYPE html>

    <html>
    <head>
        <meta name="description" content="Tout sur les apparitions muettes de la Banane Masquée dans le cinéma colombien des années 20 et 30."/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="css/list.css" rel="stylesheet" type="text/css">


        <meta charset="utf-8"/>
        <title>Trainingbook</title>


    </head>

    <body>
    <header>
        <h1>
            <i class=></i>Le superbe site à Nico <br>
            <span> <a href="http://www.bonjourponey.fr/" target="_blank">Baseline </a> </span>
        </h1>

        <form>

            <p><label for="Rechercher"> <i class="fa fa-search" aria-hidden="true"></i> </label></p>
            <p><input type="text" id="Rechercher" placeholder="Rechercher"></p>
            <p><input type="submit" value="ok"></p>
        </form>

        <nav>


            <ul>
                <li>
                    <a href="login.php">
                        <?php
                        if (isset($_SESSION["id"]) == true) {

                            $query = "SELECT UserFirstname,Username,UserPicture FROM user WHERE IdUser ='" . $_SESSION['id'] . "'";
                            $result = Select($query);
                            foreach ($result as $Id) {
                                $nom = $Id['Username'];
                                $prenom = $Id['UserFirstname'];
                                $img = $Id['UserPicture'];
                            }
                            echo("Bonjour'" . $prenom . "'  " . $nom);
                        } else
                            echo "connectez vous!";

                        ?>

                    </a>
                </li>

                <?php
if (isset($_SESSION["id"]) == true) {
    if ($_SESSION["UserRules"] != 1) {
        echo '
					<li>
						<a href="Admin.php?GEST=1">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</li>';
    }

    if ($_SESSION["UserRules"] != 0) {

        echo '
					<li>
						<a href="Admin.php?GEST=2">
							<i class="fa fa-cogs" aria-hidden="true"></i>


						</a>
					</li>
                <li >
						<a href = "Admin.php?GEST=3" >
							<i class="fa fa-lock" aria - hidden = "true" ></i >
						</a >
					</li >';
    }
}
                ?>
            </ul>
        </nav>

        <nav>
            <ul>
                <?php

                if (isset($_SESSION["id"]) == true) {

                    $query = "SELECT CategoryId,CategoryTitle FROM category";
                    $resultat = Select($query);

                    foreach ($resultat as $Id) {

                        $idcat = $Id['CategoryId'];
                        $titre = $Id['CategoryTitle'];


                        echo '<li> 
													<a href= Category.php?CAT=' . $idcat . '> 
														' . $titre . '
														
													</a> 
												</li>';

                    }
                }

                ?>
            </ul>
        </nav>

        <div>
            <?php
            if (isset($_SESSION['id']) == true) {

                echo '<img src="img/' . $img . '" width="210">';
            } else
                echo '<img src="img/nigma.jpg" width="210" >';


            ?>
        </div>

    </header>

    <section>

        <nav>
            <ul>
                <?php


                if (isset($_SESSION["id"]) == true) {


                    $query = "SELECT DISTINCT article.ArticleTitle,article.ArticleContent,article.ArticleDate,article.ArticleTime,article.Idarticle, user.Username FROM article,user,category where user.Iduser=article.Iduser and article.ArticleFlag=1";
                    $result = Select($query);

                    foreach ($result as $Id) {

                        $ArticleID = $Id['Idarticle'];
                        $title = $Id['ArticleTitle'];
                        $content = $Id['ArticleContent'];
                        $name = $Id['Username'];
                        $date = $Id['ArticleDate'];
                        $d = substr($date, 8, 2) . "-" . substr($date, 5, 2) . "-" . substr($date, 0, 4);
                        $time = $Id['ArticleTime'];
                        $t = substr($time, 0, 2) . ":" . substr($time, 3, 2);
                        $reqnbcom = "SELECT count(*) as nbcom FROM comments where comments.Idarticle=" . $ArticleID;
                        $nbcom = Select($reqnbcom);
                        foreach ($nbcom as $nbc)

                            echo(

                                '<li>
												<article>
												
												
												<div>
														<h2> <b>' . $title . '</b> </h2>
														<p> bla' . $content . '</p> 
														Post&eacute; ' . dateDisplay($d) . ' a ' . $t . ' par ' . $name . '.
												</div>
												<ul>
												' . $nbc['nbcom'] . ' <i class="fa fa-comment" aria-hidden="true"></i>
												
												<a href= article.php?ID=' . $ArticleID . '&amp;USER=' . $_SESSION['id'] . '>' . $title . '<i class="fa fa-plus-circle" aria-hidden="true"></i></a>

												</ul>
												</article>
									</li>');
                    }


                } else {

                    $query = "SELECT DISTINCT article.ArticleTitle,article.ArticleContent,article.ArticleDate,article.ArticleTime,article.idarticle, user.Username FROM article,user,category where user.Iduser=article.Iduser and article.ArticleFlag=1";
                    $result = Select($query);
                    
                    foreach ($result as $Id) {

                        $ArticleID = $Id['idarticle'];
                        $title = $Id['ArticleTitle'];
                        $content = $Id['ArticleContent'];
                        $name = $Id['Username'];
                        $date = $Id['ArticleDate'];
                        $d = substr($date, 8, 2) . "-" . substr($date, 5, 2) . "-" . substr($date, 0, 4);
                        $time = $Id['ArticleTime'];
                        $t = substr($time, 0, 2) . ":" . substr($time, 3, 2);
                        $reqnbcom = "SELECT count(*) as nbcom FROM comments where comments.Idarticle=" . $ArticleID;
                        $nbcom = Select($reqnbcom);
                        foreach ($nbcom as $nbc)

                            echo(

                                '<li>
												<article>
												
												
												<div>
														<h2> <b>' . $title . '</b> </h2>
														<p> bla' . $content . '</p> 
														Post&eacute; ' . dateDisplay($d) . ' a ' . $t . ' par ' . $name . '.
												</div>
												<ul>
												' . $nbc['nbcom'] . ' <i class="fa fa-comment" aria-hidden="true"></i>
												
												<a href= login.php>' . $title . '<i class="fa fa-plus-circle" aria-hidden="true"></i></a>

												</ul>
												</article>
									</li>');
                    }
                }


                ?>
            </ul>
        </nav>

       

    </section>





    <script src="JS/jquery-2.2.3.js"></script>
    <script src="JS/jquery.jscroll.min.js"></script>
    <script src="JS/Testjs.js"></script>


    </body>


    </html>


<?php

function dateDisplay($date)
{

    switch ($date) {

        case $date == date("d-m-Y"):
            $date = "Aujourd'hui";
            break;

        case $date == date("d-m-Y") - 1:
            $date = "Hier";
            break;

        case $date < date("d-m-Y"):
            $date = "le " . $date;
            break;

    }
    return $date;
}

?>
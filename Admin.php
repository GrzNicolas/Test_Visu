<?php
/**
 * Created by PhpStorm.
 * User: Zyk
 * Date: 09/08/2016
 * Time: 14:31
 * Yahou github
 */
session_start();
include("include/connect.php");


if (isset($_POST["CATSUP"])==true) {

    $query="DELETE FROM article WHERE article.CategoryId =".$_POST["CATSUP"];
    InsertUpdateDelete($query);
    $query="DELETE FROM category where CategoryId=".$_POST["CATSUP"];
    InsertUpdateDelete($query);
}

if (isset($_POST["PUBLI"])==true and isset($_POST["ARTID"])==true ) {
    switch ($_POST["PUBLI"]) {

        case 1:
            $query = "UPDATE article set article.ArticleFlag=1 where article.Idarticle=".$_POST["ARTID"];
            InsertUpdateDelete($query);
            echo $query;
            break;
    }
}


if(isset($_POST["CAT"])==true){


    $query = "INSERT INTO `category` (`CategoryId`, `CategoryTitle`, `CategoryDate`, `CategoryTime`, `CategoryFlag`) VALUES (NULL, '".$_POST["CAT"]."', '". date("d-m-y")."','".date("H:i")."', '1');";
    // echo $query;
    InsertUpdateDelete($query);
}








?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta name="description" content="Tout sur les apparitions muettes de
la Banane Masquée dans le cinéma colombien des années 20 et 30." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




    <link href="css/list.css"rel="stylesheet" type="text/css" >

    <meta charset=utf-8" />
    <title>Trainingbook</title>

</head>

<body>
<header>
    <h1>
        <i class=></i>Training Book <br>
        <span> <a href="Main.php">Baseline </a> </span>
    </h1>



    <nav>


        <ul>
            <li>
                <a href="login.php">
                    <?php
                    if (isset($_SESSION["id"]) == true) {

                        $query = "SELECT UserFirstname,Username,UserPicture,UserRules FROM user WHERE IdUser ='" . $_SESSION['id'] . "'";
                        $result = Select($query);
                        foreach ($result as $Id) {
                            $nom = $Id['Username'];
                            $prenom = $Id['UserFirstname'];
                            $img = $Id['UserPicture'];
                            $_SESSION["UserRules"]=$Id['UserRules'];
                        }
                        echo("Bonjour'" . $prenom . "'  " . $nom);
                    } else
                        echo "connectez vous!";

                    ?>

                </a>
            </li>

            <?php
            if ($_SESSION["UserRules"] != 1 ) {
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



        <admin>

            <?php
                    switch ($_GET["GEST"]) {

                        case 1:

                            if (isset($_POST["TITRE"]) == true and isset($_POST["content"]) == true) {


                                $query = "INSERT INTO `article` (`Idarticle`, `ArticleTitle`, `ArticleContent`,ArticlePicture, `ArticleDate`, `ArticleTime`, `ArticleFlag`, `CategoryId`, `Iduser`) VALUES (NULL,'" . $_POST["TITRE"] . "','" . $_POST["content"] . "',NULL,'" . date("d-m-y") . "','" . date("H:i") . "','0','" . $_POST["Category"] . "','" . $_SESSION["id"] . "')";
                                // echo $query;
                                InsertUpdateDelete($query);
                            }


                            $query = "SELECT CategoryTitle,categoryId FROM category ";

                            $resultat = Select($query);

                            echo ' <form action : "Admin.php" method="POST" >
                                                 <article>
                                                         <select name="Category" >	';


                            foreach ($resultat as $Id) {

                                $title = $Id['CategoryTitle'];
                                $idcat = $Id['categoryId'];

                                echo

                                    ' 								
										
												            <option value=' . $idcat . '>' . $title . '</option>';
                            }
                            echo '		
									                    </select>
									                    
							<p><label>Titre Article</label> : <input type="text" name="TITRE" /></p>
									    
						    <textarea name="content" cols="50" rows="5" style="border:solid 1px orange;">
                                
                            </textarea>
                            
                            <p><input type ="submit" value="Ajouter un article" ></p>               
									 
									                    
									                    
									                    
									                    
                                                    </article>
                                     </form>
                                             	
									';


                            break;
                        case 2:
                            echo 'Categorie ';

                            echo '<form action : "Admin.php" method="POST">
                                                 <article>
                                                        
									                    
							<p><label>Titre Categorie</label> : <input type="text" name="CAT" /></p>
									    
						                               
                            <p><input type ="submit" value="Ajouter une categorie" ></p>               
															                    
									                    
									                    
									                    
                                                    </article>
                                     </form>';


                            $query = "SELECT CategoryTitle,categoryId FROM category ";

                            $resultat = Select($query);

                            echo '<form action : "Admin.php" method="POST">
                                                 <article>
                                                         <select name="CATSUP" >	';


                            foreach ($resultat as $Id) {

                                $title = $Id['CategoryTitle'];
                                $idcat = $Id['categoryId'];

                                echo

                                    ' 								
										
												            <option value=' . $idcat . '>' . $title . '</option>';
                            }
                            echo '		
									                    </select>
									                    
							
                            
                            <p><input type ="submit" value="effacer categorie" ></p>               
									 
									                    
									                    
									                    
									                    
                                                    </article>
                                     </form>
                                             	
									';
                            break;
                        case 3:
                            echo 'Autorisation ';

                            $query = "SELECT DISTINCT article.ArticleTitle,article.ArticleContent,article.Idarticle, user.Username FROM article,user,category where user.Iduser=article.Iduser and article.ArticleFlag=0 ";
                            $result = Select($query);

                            foreach ($result as $Id) {

                                $ArticleID = $Id['Idarticle'];
                                $title = $Id['ArticleTitle'];
                                $content = $Id['ArticleContent'];
                                $name = $Id['Username'];

                                    echo(

                                        '<li>
                                                
                                               <form action : "Admin.php" method="POST">
												<article>
												<input type="HIDDEN" name="ARTID" value="'.$ArticleID.'" /></p>
												<div>
														<h2> <b>' . $title . '</b> </h2>
														
														<p>' . $content . '</p> 
														Post&eacute; par ' . $name . '
												</div>
												<ul>
												            <select name="PUBLI" >

					
										
												            <option value=0 > ne pas publier </option>
												            <option value=1 > Publier </option>
												            
                           		
									                    </select>
									             
                                                <p><input type ="submit" value="Valider" ></p>   
												</ul>
												</article>
												</form>
									</li>');
                            }
                            break;
                    }
?>

        </admin>

</body>
</html>
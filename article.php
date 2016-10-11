<?php
session_start();
 include("include/connect.php");
//
//echo $_GET['ID']; //Affiche : "bonjour"
//echo $_SESSION["id"]; //Affiche : "world"
//
//$url=$_SERVER['REQUEST_URI'];
////var_dump($url);
//$liste=explode(".php", $url);
////var_dump($liste);
//$idart=explode("=", $liste[1]);
//var_dump($id);
//var_dump($_SESSION);
//	$query = "SELECT id FROM `article` WHERE URL="."'".$_GET['ID']."'";
//
//       					$resultat = Select($query);
//
//						        foreach($resultat as $Id)
//									{
//										$idart = $Id['id'];
//
//
//									}



if(isset($_POST["coment"])==true){
	 $query = "SELECT article.*,user.Username,user.Iduser FROM article,user WHERE article.Idarticle=".$_GET['ID']." AND article.Iduser=user.Iduser ";

						$resultat = Select($query);
						        foreach($resultat as $Id)
									{	
										$idart = $Id['Idarticle'];
										$iduser=$Id['Iduser'].
										$title = $Id['ArticleTitle'];
										$content = $Id['ArticleContent'];
										$img= $Id['ArticlePicture'];
										$name=$Id['Username'];
										$date=$Id['ArticleDate'];
										$d=substr($date,8,2)."-".substr($date,5,2)."-".substr($date,0,4);
										$time=$Id['ArticleTime'];
										$t=substr($time,0,2).":".substr($time,3,2);
										
 $query = "INSERT INTO comments (`idComments`, `idUser`, `Idarticle`, `CommentArticle`, `CommentDate`, `CommentTime`, `CommentFlag`) VALUES (NULL,'". $_SESSION["id"]."','".$_GET["ID"]."','". $_POST["coment"]."','". date("d-m-y")."','".date("H:i")."', '1');";
   InsertUpdateDelete($query);
									}
}

?>


<!DOCTYPE html>

<html>
<head>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" >
<link href="css/list.css" rel="stylesheet" type="text/css" >


<meta charset=utf-8" />
<title>Liste</title>




</head>

<body>

<!--commentaire-->
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


<section>
        
       
        		 <?php
					
						
					 $query = "SELECT distinct article.*,user.UserFirstname,user.Iduser FROM article,user WHERE article.Idarticle=".$_GET['ID']." AND article.Iduser=user.Iduser and article.ArticleFlag=1" ;
       					$resultat = Select($query);
						        foreach($resultat as $Id)
									{	
										$idart = $Id['Idarticle'];
										$title = $Id['ArticleTitle'];
										$cat   = $Id['CategoryId'];
										$content = $Id['ArticleContent'];
										$img= $Id['ArticlePicture'];
										$name=$Id['UserFirstname'];
										$date=$Id['ArticleDate'];
										$d=substr($date,8,2)."-".substr($date,5,2)."-".substr($date,0,4);
										$time=$Id['ArticleTime'];
										$t=substr($time,0,2).":".substr($time,3,2);
										echo $idart;
										
										
									echo (
									
									'   									
										
												<article>
																							
																							
												<img src="img/'.$img.'" width="210"/>
												
														
												<p>'.$content.'</p> 
														
												
			
												</article>												
									      			
												
												
									'
									
									
									
									
									);
									
									}
									

					
					?>
                    
                    
                    <?php
      						 $query = "SELECT comments.CommentArticle,user.UserPicture,user.Username,comments.CommentDate FROM comments,user WHERE comments.Idarticle=".$_GET['ID']." AND comments.Iduser=user.Iduser  ";
       					
						$resultat = Select($query);
						        foreach($resultat as $Id)
									{	
										
										$content = $Id['CommentArticle'];
										$img= $Id['UserPicture'];
										$name=$Id['Username'];
										$date=$Id['CommentDate'];
										$d=substr($date,8,2)."-".substr($date,5,2)."-".substr($date,0,4);
										
										
										
									echo (
									
									'   									
										<li>
												<article>
												
												
												
												<img src="img/'.$img.'" width="210"/>
												
														
												<p>'.$content.'</p> 
												<p> le '.$d.' par  '.$name.'</p>		
												
			
												</article>												
									      			
												
										</li>		
									'
									
									
									
									
									);
									
									}
									

					
					?>  
        		
                		<form action :"article.php" method="POST" >
					
                        	<textarea name="coment" cols="50" rows="5" style="border:solid 1px orange;">
                                
                            </textarea>
                            
                            <p><input type ="submit" value="ok" ></p> 
                            
                            
                            
                        </form>
                


        
     
        
        </section>
        


        
 <script src="JS/jquery-2.2.3.js"></script>
 <script src="JS/jquery.jscroll.min.js"> </script>       
 <script src="JS/Testjs.js"> </script> 





</body>


</html>



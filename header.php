<!--commentaire conflit-->
<?
session_start();
include("include/connect.php");
echo $_SESSION;
?>
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
		<i class=></i>Le site à Nico <br>
		<span> <a href="Main.php">Baseline </a> </span>
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
		
</body>
</html>
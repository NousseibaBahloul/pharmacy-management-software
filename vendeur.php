<!DOCTYPE html>
<html>
<head>
	<title>Vendeur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="imgs\3.png">
</head>
<body class="body">
	<nav class="menu">
		<!--span class="close-btn">X</span-->
		<ul id="father">
			<h1 class="tache"> Les tâches </h1>
			<li> Gérer les ventes 
				<ul id="son">
					<li><a href="crea-vent.php"> Créer une vente </a></li>
					<li><a href="cons-vent.php"> Consulter de vente </a></li>									
				</ul>
			</li>
			<li> Liste des produits
				<ul id="son">
					<li><a href="list-prod2.php"> Consulter la liste des produits </a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<div class="content">
		<h1 class="page"> Page Vendeur <h1>

		<div class="a">	
			<p class="p">
			Bienvenue M.Vendeur sur votre page personnelle du logiciel gestion de pharmacie.<br>
			Ce programme est spécialement conçu pour vous faciliter la vente de médicaments et la gestion de la pharmacie. Vous pouvez effectuer de nombreuses tâches différentes, que nous vous proposons de manière systématique et sans à-coups pour effectuer facilement votre travail. Nous espérons que nous aurons rempli toutes vos exigences. Si vous avez d'autres suggestions, vous pouvez nous les proposer <a href="sugg2.php" style="text-decoration: none;color: #990000">ici</a> avec plaisir.<br>
			<span style="margin-left: 50%"> Bonne chance monsieur</span>			
			</p>

        </div>

<form method="post" action="include1/logout1.php">

<div id="mySidenav" class="sidenav">

    <a href="vendeur.php" id="home">Home</a>
    <a href="sugg2.php" id="blog">Vos suggestions</a>
    <a href="" id="about1"><input type="submit" name="" value="LogOut" id="log"></a>

</div>
</form>
	</div>
    <script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Administrateur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="shortcut icon" href="imgs\3.png">
</head>
<body class="body">
	<nav class="menu">
		<!--span class="close-btn">X</span-->
		<ul id="father">
			<h1 class="tache"> Les tâches </h1>
			<li> Gérer les fournisseurs 
				<ul id="son">
					<li><a href="ajou-four.php"> Ajouter fournisseur </a></li>
					<li><a href="supp-four.php"> Supprimer fournisseur </a></li>
					<li><a href="modi-four.php"> Modifier fournisseur </a></li>
					<li><a href="list-four.php"> Consulter la liste des fournisseurs </a></li>	
				</ul>
		  </li>
			<li> Gérer les produits
				<ul id="son">
					<li><a href="ajou-prod.php"> Ajouter produit </a></li>
					<li><a href="sup-prod.php"> Supprimer produit </a></li>
					<li><a href="mod-prod.php"> Modifier produit </a></li>
					<li><a href="list-prod.php"> Consulter la liste des produits </a></li>	
					<li><a href="affi-stoc.php"> Afficher stock alert </a></li>
					<li><a href="prod-expi.php"> Afficher les produits périmés </a></li>					
				</ul>
			</li>
			<li> Gérer les factures
				<ul id="son">
					<li><a href="ajou-fact.php"> Ajouter facture </a></li>
					<li><a href="supp-fact.php"> Supprimer facture </a></li>					
					<li><a href="list-fact.php"> Consulter la liste des factures </a></li>	
				</ul>
			</li>
			<li> Gérer famille des produits
				<ul id="son">
					<li><a href="list-fami.php"> Liste des familles </a></li>
				</ul>
			</li>
			<li> Gérer les vendeurs
				<ul id="son">
					<li><a href="ajou-vend.php"> Ajouter vendeur </a></li>
					<li><a href="supp-vend.php"> Supprimer vendeur </a></li>
					<li><a href="modi-vend.php"> Modifier vendeur </a></li>
				</ul>
			</li>			
		</ul>
	</nav>
	<div class="content" style="color:#">  
		<h1 class="page"> Page Administrateur <h1>
		<div class="a">	
			<p class="p">
				Bienvenue M.Administrateur sur votre page personnelle du logiciel gestion de pharmacie.<br>
				Ce programme est spécialement conçu pour vous faciliter la vente de médicaments et la gestion de la pharmacie. Vous pouvez effectuer de nombreuses tâches différentes, que nous vous proposons de manière systématique et sans à-coups pour effectuer facilement votre travail. Nous espérons que nous aurons rempli toutes vos exigences. Si vous avez d'autres suggestions, vous pouvez nous les proposer <a href="sugg.php" style="text-decoration: none;color: #990000">ici</a> avec plaisir.<br>
				<span style="margin-left: 50%"> Bonne chance monsieur</span>							
			</p>
        </div>
        	 
<form method="post" action="include/logout.php">

<div id="mySidenav" class="sidenav">

    <a href="admin.php" id="home">Home</a>
    <a href="sugg.php" id="blog">Vos suggestions</a>
    <a href="vendeur.php" id="projects">Vendeur</a><a href="" id="about">
    <input type="submit" name="Input" value="LogOut" id="log">
    </a></div>
</form>	
	
</div>

    <script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
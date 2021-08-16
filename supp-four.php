<!DOCTYPE html>
<html>
<head>
	<title>Supprimer fournisseur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="shortcut icon" href="imgs\3.png">
	
<script>
	function Numero(){
		if (event.keyCode < 48 || event.keyCode > 57)
		{
			event.returnValue = false;
			alert("SVP , Entrer uniquement des chiffres !");
		}
    }
</script>
</head>
<body class="body">
	<nav class="menu">
		<!--span class="close-btn">X</span-->
		<ul id="father">
			<h1 class="tache"> Les tâches </h1>
			<li> Gérer les fournisseurs 
				<ul id="son">
					<li><a href="ajou-four.php"> Ajouter fournisseur </a></li>
					<li style="background-color: #606060;"><a href="supp-four.php" style="color: #3eb408;font-weight: bold;"> Supprimer fournisseur </a></li>
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
					<li><a href="affi-stoc.php"> Afficher le stock alerte </a></li>
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
	<div class="content">
		<h1 class="page"> Supprimer fournisseur <h1>
        <div class="a">
        	<div class="b">
        		<form action="" method="POST">
		        	<table class="table">
		        		<tr style="border-bottom: 1px solid #fefefe">
		        			<td><input type="text" name="nom" placeholder="Nom" onkeypress="Caractere()" autofocus=""> </td>
		        			<td><input type="text" name="prénom" placeholder="Prénom" onkeypress="Caractere()"> </td>
		        		</tr>
		        		<tr>
		        			<td><label style="font-size:20px;letter-spacing: 3px">Confirmer :</label></td>
		        			<td style="">
		        				<label style="font-size: 14px;letter-spacing: 3px">Oui</label>
		        				<input type="radio" name="conf" accept="1" value="oui"> 
		        				<label style="font-size: 14px;letter-spacing: 3px">Non</label>
		        				<input type="radio" name="conf" accept="2" value="non" checked> 
		        			</td>
		        		</tr>
		        		<tr style="border-top: 1px solid #fefefe">        		
		        			<td colspan="2"><input type="submit" name="supprimer" value="Supprimer"> </td>
		        		</tr>
		        	</table>         			
        		</form>       		
        	</div>
        </div>
        	 
<form method="post" action="include/logout.php">

<div id="mySidenav" class="sidenav">
    <a href="admin.php" id="home">Home</a>
    <a href="sugg.php" id="blog">Vos suggestions</a>
    <a href="vendeur.php" id="projects">Vendeur</a>
    <a href="" id="about"><input type="submit" name="" value="LogOut" id="log"></a>

</div>
</form>       
	</div>
    <script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
<?php
$connect= mysql_connect("localhost","nousseiba","17031999");
if($connect){
    $db=mysql_select_db("pharmacie");
    if($db){}else{
    	echo '<script>alert("La base de données n est pas connectée");</script>';
    }  
}else{
    echo '<script>alert("Le serveur local n était pas connecté");</script>';
} 
$nom=$_POST['nom'];
$prénom=$_POST['prénom'];
$conf=$_POST['conf'];
$submit=$_POST['supprimer'];
if ($submit) {
	if ($nom=="" or $prénom=="") {
		echo '<script>alert("Entrer toutes les données");</script>';
	}
	else{
		$query=mysql_query("SELECT * FROM `fournisseur` WHERE `nom`='$nom' AND `prénom`='$prénom'");
    	$rows = mysql_num_rows($query);
        if ($rows==0) {
        	echo '<script>alert("Le fournisseur n existe pas");</script>';
        }
        else{
        	if ($conf=="oui") {
        		$query=mysql_query("DELETE FROM `fournisseur` WHERE `nom`='$nom' AND `prénom`='$prénom'");
        		if ($query) {
        			echo '<script>alert("Suppression avec succès");</script>'; 
        		}else{
        			echo '<script>alert("Pas supprimé avec succès");</script>';
        		}
        		      		
        	}
        }
	}
}
?>
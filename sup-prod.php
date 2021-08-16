<!DOCTYPE html>
<html>
<head>
	<title>supprimer Produit</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/ajou-fourr.css">
    <link rel="shortcut icon" href="imgs\3.png">
</head>
<body class="body">
	<nav class="menu">
		<!--span class="close-btn">X</span-->
		<ul id="father">
			<h1 class="tache"> Les tâches </h1>
			<li> Gérer les fournisseurs 
				<ul id="son">
					<li id="choix"><a href="ajou-four.php"> Ajouter fournisseur </a></li>
					<li><a href="supp-four.php"> Supprimer fournisseur </a></li>
					<li><a href="modi-four.php"> Modifier fournisseur </a></li>
					<li><a href="list-four.php"> Consulter la liste des fournisseurs </a></li>	
				</ul>
			</li>
            <li> Gérer les produits
                <ul id="son">
                    <li><a href="ajou-prod.php"> Ajouter produit </a></li>
                    <li style="background-color: #606060;"><a href="sup-prod.php" style="color: #3eb408;font-weight: bold;"> Supprimer produit </a></li>
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
			<li> Gérer la famille de produits
				<ul id="son">
					<li><a href="list-fami.php"> listes des familles </a></li>
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
		<h1 class="page"> supprimer Produit </h1>
	   <div class="a">
        	<div class="b">
        		<form action="" method="POST">
		        	<table class="table">
		        		<tr style="border-bottom: 1px solid #fefefe">
		        			<td colspan="2"><input type="text" name="copr" placeholder="Code de produit" autofocus="" onkeypress="Numero()"></td>
		        		</tr>
		        		<tr>
		        			<td><label style="font-size:20px;letter-spacing: 3px;font-weight: bold;">Confirmer :</label></td>
		        			<td style="">
		        				<label style="font-size: 14px;letter-spacing: 3px">Oui</label>
		        				<input type="radio" name="conf" value="oui"> 
		        				<label style="font-size: 14px;letter-spacing: 3px">Non</label>
		        				<input type="radio" name="conf" value="non" checked> 
		        			</td>
		        		</tr>
		        		<tr style="border-top: 1px solid #fefefe">        		
		        			<td colspan="2"><input type="submit" name="supprimer" value="Supprimer"> </td>
		        		</tr>
		        	</table>        			
        		</form>  		
        	</div>
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
$copr=$_POST['copr'];
$conf=$_POST['conf'];
$supprimer=$_POST['supprimer'];
if ($supprimer) {
	if ($copr=="") {
		echo '<script>alert("Entrer code de produit");</script>';
	}
	else{
		$query=mysql_query("select * from produit where codeproduit = '$copr' ");
    	$rows = mysql_num_rows($query);
        if ($rows==0) {
        	echo '<script>alert("Le code de produit n existe pas");</script>';
        }
        else{
        	if ($conf=="oui") {
        		$query=mysql_query("DELETE FROM `produit` WHERE codeproduit='$copr'");
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
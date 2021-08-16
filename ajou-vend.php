<!DOCTYPE html>
<html>
<head>
	<title>Ajouter vendeur</title>
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
					<li><a href="supp-four.php"> Supprimer produit </a></li>
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
					<li style="background-color: #606060;"><a href="ajou-vend.php" style="color: #3eb408;font-weight: bold;"> Ajouter vendeur </a></li>
					<li><a href="supp-vend.php"> Supprimer vendeur </a></li>
					<li><a href="modi-vend.php"> Modifier vendeur </a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<div class="content">
		<h1 class="page"> Ajouter vendeur <h1>
        <div class="a">
        	<div class="b">
        		<form method="POST" action="">
		        	<table class="table">
		        		<tr>
		        			<td colspan="2"><input type="text" name="idve" placeholder="ID vendeur" autofocus="" onkeypress="Numero()"> </td>
		        		</tr>
		        		<tr>
		        			<td colspan="2"><input type="password" name="password" placeholder="Password" > </td>
		        		</tr>
		        		<tr style="border-top: 1px solid #fefefe">        		
		        			<td colspan="2"><input type="submit" name="ajouter" value="Ajouter"> </td>
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
$idve=$_POST['idve'];
$password=$_POST['password'];
$ajouter=$_POST['ajouter'];
if ($ajouter) {
	if ($idve=="" or $password=="") {
		echo '<script>alert("Entrer toutes les données");</script>';
	}
	else{
		$query=mysql_query("select * from vendeur where id = '$idve' ");
    	$rows = mysql_num_rows($query);
        if ($rows==1) {
        	echo '<script>alert("Cet ID est existe déjà");</script>';
        }
        else{
			$query1=mysql_query("select * from vendeur where password = '$password' ");
	    	$rows1 = mysql_num_rows($query1);
	        if ($rows1==1) {
	        	echo '<script>alert("Ce password est existe déjà");</script>';
	        }else{
	        	$query2=mysql_query("INSERT INTO vendeur VALUES('$idve','$password')");
	        	if ($query2) {
	        		echo '<script>alert("Ajouté avec succès");</script>';
	        	}else{
	        		echo '<script>alert("Pas ajouté avec succès");</script>';
	        	}

	        }
        }
	}
}
?>
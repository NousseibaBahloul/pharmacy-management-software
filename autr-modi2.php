<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Autre modification</title>
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
					<li><a href="supp-four.php"> Supprimer fournisseur </a></li>
					<li style="background-color: #606060;"><a href="modi-four.php" style="color: #3eb408;font-weight: bold;"> Modifier fournisseur </a></li>
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
		<h1 class="page"> Autre modification <h1>
        <div class="a">
        	<div class="b">
        		<form action="" method="POST">
		        	<table class="table">
		        			<tr>
			        			<td colspan="2" style="font-size: 15px">
			        				<label style="font-size:18px;letter-spacing: 3px">Code produit :</label>
			      
<?php 
$lm=$_SESSION["copr"];
echo $lm;
?>			        				
			        			</td>
			        		</tr>
			        		<tr style="height: 100px;vertical-align: top">
			        			<td>
			        				<label style="font-size:20px;letter-spacing:0px;word-spacing:2px">L'information modifier:</label>
			        			</td>
			        			<td>
			        				<select name="info">
			        					<option value="vide"></option>        					
			        					<option value="nom">Nom</option>
			        					<option value="famille">Nom de famille</option>
			        					<option value="dosage">Dosage</option>
			        					<option value="quantité">Quantité</option>
			        					<option value="forme">Forme</option>
			        					<option value="prix">Prix ppa</option>
			        					<option value="date">Date Expiré</option>       					
			        				</select>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<input type="submit" name="go" value="Voir l'information spécifiée :" style="width: 95%;font-size: 12px;border-radius: 4px;margin-bottom: 10px">
			        			</td>	        		     
			        			<td style="font-size: 16px">
<?php 
$connect= mysql_connect("localhost","nousseiba","17031999");

$db=mysql_select_db("pharmacie");
$lm1=$_SESSION["copr"];
//echo $lm1;

$autr=$_POST['autr1'];
 	    $m=$_POST['m'];
	 	$info = $_POST['info'];
	// 	$copr = $_POST['copr'];
	 	$modi=$_POST['modi'];
	 	$go=$_POST['go'];
 	
$n=0;	
	if (isset($_POST['info'])) {
		//echo $lm1;
	 	switch ($info) {
	 		case 'nom':
	 			$query = mysql_query("SELECT nom FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->nom; 			
	 			echo ($c);
	 			$n=1;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;
	 			break;
	 		case 'famille':
	 			$query = mysql_query("SELECT nom_famille FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->nom_famille; 			
	 			echo ($c);
	 			$n=2;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;
	 			break;	 			
	 		case 'dosage':
	 			$query = mysql_query("SELECT dosage FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->dosage; 			
	 			echo ($c);
	 			$n=3;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;
	 			break;
	 		case 'quantité':
	 			$query = mysql_query("SELECT quantité FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->quantité; 			
	 			echo ($c);
	 			$n=4;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;
	 			break;
	 		case 'forme':
	 			$query = mysql_query("SELECT forme FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->forme; 			
	 			echo ($c);
	 			$n=5;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;	 			
	 			break;
	 		case 'prix':
	 			$query = mysql_query("SELECT prix_ppa FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->prix_ppa; 			
	 			echo ($c);
	 			$n=6;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;
	 			break;			
	 		case 'date':
	 			$query = mysql_query("SELECT date_expiré FROM `produit` WHERE codeproduit='$lm1'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->date_expiré; 			
	 			echo ($c);
	 			$n=7;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["copr"]=$lm1;
	 			break;

	 		default:
	 			echo "Sélectionnez une information";
	 			break;
	 	}
	}	


if ($m) {

//echo $_SESSION["n"];
		if ($_SESSION["n"]==1) {
			$ll1=$_SESSION["copr"];
				$query = mysql_query("UPDATE `produit` SET `nom` = '$modi' WHERE `codeproduit`= '$ll1'");
				if ($query) {
					//	echo '<script>alert("Modifié avec succès");</script>';
					if ($autr == 'oui') {
					//	$_SESSION["copr"]=$lm1;
						header("location:autr-modi2.php");
					}
					else{
						header("location:mod-prod.php");		
					}
				}else{
					echo '<script>alert("Modifié n est pas succès");</script>';
				}
			
		}
		elseif ($_SESSION["n"]==2) {
			$ll1=$_SESSION["copr"];
				$query = mysql_query("UPDATE `produit` SET `nom_famille` = '$modi' WHERE `codeproduit`= '$ll1'");
				if ($query) {
					if ($autr == 'oui') {
						header("location:autr-modi2.php");
					}
					else{
						header("location:mod-prod.php");		
					}
				}else{
					echo '<script>alert("Pas modifié avec succès");</script>';
				}
			
		}				
		elseif($_SESSION["n"]==3){
			$ll1=$_SESSION["copr"];

			$query = mysql_query("UPDATE `produit` SET `dosage` = '$modi' WHERE `codeproduit`= '$ll1'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi2.php");
}
else{
	header("location:mod-prod.php");		
}			}else{
				echo '<script>alert("Pas modifié avec succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==4){
			$ll1=$_SESSION["copr"];			
			$query = mysql_query("UPDATE `produit` SET `quantité` = '$modi' WHERE `codeproduit`= '$ll1'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi2.php");
}
else{
	header("location:mod-prod.php");		
}			}else{
				echo '<script>alert("Pas modifié avec succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==5){
			$ll1=$_SESSION["copr"];
			$query = mysql_query("UPDATE `produit` SET `forme` = '$modi' WHERE `codeproduit`= '$ll1'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi2.php");
}
else{
	header("location:mod-prod.php");		
}			}else{
				echo '<script>alert("Pas modifié avec succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==6){
			$ll1=$_SESSION["copr"];			
			$query = mysql_query("UPDATE `produit` SET `prix_ppa` = '$modi' WHERE `codeproduit`= '$ll1'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi2.php");
}
else{
	header("location:mod-prod.php");		
}			}else{
				echo '<script>alert("Pas modifié avec succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==7){
			$ll1=$_SESSION["copr"];			
			$query = mysql_query("UPDATE `produit` SET `date_expiré` = '$modi' WHERE `codeproduit`= '$ll1'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi2.php");
}
else{
	header("location:mod-prod.php");		
}			}else{
				echo '<script>alert("Pas modifié avec succès");</script>';
			}	
		}	
	    else{
	    	echo '<script>alert("Error");</script>';

	    }
}

?>
	    				
			        			</td>
			        		</tr>
			        		<tr style="border-top: 1px solid #fefefe">        		
			        			<td colspan="2"><input type="text" name="modi" placeholder="modification"> </td>
			        		</tr>		        		
			        		<tr>
			        			<td><label style="font-size:20px;letter-spacing: 3px">Autre modification :</label></td>
			        			<td style="">
			        				<label style="font-size: 14px;letter-spacing: 3px">Oui</label>
			        				<input type="radio" name="autr1" value="oui" checked> 
			        				<label style="font-size: 14px;letter-spacing: 3px">Non</label>
			        				<input type="radio" name="autr1" value="non"> 
			        			</td>
			        		</tr>
			        		<tr style="border-top: 1px solid #fefefe">        		
			        			<td colspan="2"><input type="submit" name="m" value="Modifier"> </td>
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
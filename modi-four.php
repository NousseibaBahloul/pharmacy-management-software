<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier fournisseur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="imgs\3.png">
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
		<h1 class="page"> Modifier fournisseur <h1>
        <div class="a">
        	<div class="b">
        		<form action="" method="POST" oninput="">
		        	<table class="table">
		        		<tr style="border-bottom: 1px solid #fefefe">
		        			<td colspan="2"><input type="text" name="cofo" placeholder="code fournisseur" autofocus="" onkeypress="Numero()"> </td>
		        		</tr>
		        		<tr style="height: 100px;vertical-align: top">
		        			<td>
		        				<label style="font-size:20px;letter-spacing:0px;word-spacing:2px">L'information modifier:</label>
		        			</td>
		        			<td>
       				
		        				<select name="info">
		        					<option value="vide"></option>        					
		        					<option value="nom">Nom</option>
		        					<option value="prénom">Prénom</option>
		        					<option value="ville">Ville</option>
		        					<option value="tel">Numéro de téléphone</option>
		        					<option value="fax">Fax</option>
		        					<option value="email">Email</option>
		        					<option value="adresse">Adresse</option>        					
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


$autr=$_POST['autr'];
 	    $m=$_POST['m'];
	 	$info = $_POST['info'];
	 	$cofo = $_POST['cofo'];
	 	$modi=$_POST['modi'];
	 	$go=$_POST['go'];
 	
$n=0;	
	if (isset($_POST['info'])) {
	 	switch ($info) {
	 		case 'nom':
	 			$query = mysql_query("SELECT nom FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->nom; 			
	 			echo ($c);
	 			$n=1;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;
	 			break;
	 		case 'prénom':
	 			$query = mysql_query("SELECT prénom FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->prénom; 			
	 			echo ($c);
	 			$n=2;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;
	 			break;	 			
	 		case 'ville':
	 			$query = mysql_query("SELECT ville FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->ville; 			
	 			echo ($c);
	 			$n=3;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;
	 			break;
	 		case 'tel':
	 			$query = mysql_query("SELECT téléphon FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->téléphon; 			
	 			echo ($c);
	 			$n=4;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;
	 			break;
	 		case 'fax':
	 			$query = mysql_query("SELECT fax FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->fax; 			
	 			echo ($c);
	 			$n=5;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;	 			
	 			break;
	 		case 'email':
	 			$query = mysql_query("SELECT email FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->email; 			
	 			echo ($c);
	 			$n=6;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;
	 			break;			
	 		case 'adresse':
	 			$query = mysql_query("SELECT adresse FROM `fournisseur` WHERE codefournisseur='$cofo'") ;
				$row=mysql_fetch_object($query);
	    		$c=$row->adresse; 			
	 			echo ($c);
	 			$n=7;
	 			$_SESSION["n"]=$n;
	 			$_SESSION["cofo"]=$cofo;
	 			break;

	 		default:
	 			echo "Sélectionnez une information";
	 			break;
	 	}
	}	


if ($m) {

//echo $_SESSION["n"];
		if ($_SESSION["n"]==1) {
			$ll=$_SESSION["cofo"];
			$qq=mysql_query("SELECT prénom FROM `fournisseur` WHERE codefournisseur='$ll'");
			$rr=mysql_fetch_object($qq);
			$kk=$rr->prénom;
			$qq1=mysql_query("SELECT * FROM `fournisseur` WHERE `nom`='$modi' AND `prénom`='$kk'");
    		$rr1 = mysql_num_rows($qq1);
			if ($rr1 == 1) {
				echo '<script>alert("Il y a un autre fournisseur de la même nom et même prénom ");</script>';
			}else{
				$query = mysql_query("UPDATE `fournisseur` SET `nom` = '$modi' WHERE `codefournisseur`= '$ll'");
				if ($query) {
					//	echo '<script>alert("Modifié avec succès");</script>';
					if ($autr == 'oui') {
						header("location:autr-modi.php");
					}
					else{
						header("location:modi-four.php");		
					}
				}else{
					echo '<script>alert("Modifié n est pas succès");</script>';
				}
			}
		}
		elseif ($_SESSION["n"]==2) {
			$ll=$_SESSION["cofo"];
			$qq=mysql_query("SELECT nom FROM `fournisseur` WHERE codefournisseur='$ll'");
			$rr=mysql_fetch_object($qq);
			$kk=$rr->nom;
			$qq1=mysql_query("SELECT * FROM `fournisseur` WHERE `prénom`='$modi' AND `nom`='$kk'");
    		$rr1 = mysql_num_rows($qq1);
			if ($rr1 == 1) {
				echo '<script>alert("Il y a un autre fournisseur de la même nom et même prénom ");</script>';
			}else{
				$query = mysql_query("UPDATE `fournisseur` SET `prénom` = '$modi' WHERE `codefournisseur`= '$ll'");
				if ($query) {
					//	echo '<script>alert("Modifié avec succès");</script>';
					if ($autr == 'oui') {
						header("location:autr-modi.php");
					}
					else{
						header("location:modi-four.php");		
					}
				}else{
					echo '<script>alert("Modifié n est pas succès");</script>';
				}
			}
		}				
		elseif($_SESSION["n"]==3){
			$ll=$_SESSION["cofo"];

			$query = mysql_query("UPDATE `fournisseur` SET `ville` = '$modi' WHERE `codefournisseur`= '$ll'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi.php");
}
else{
	header("location:modi-four.php");		
}			}else{
				echo '<script>alert("Modifié n est pas succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==4){
			$ll=$_SESSION["cofo"];			
			$query = mysql_query("UPDATE `fournisseur` SET `téléphon` = '$modi' WHERE `codefournisseur`= '$ll'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi.php");
}
else{
	header("location:modi-four.php");		
}			}else{
				echo '<script>alert("Modifié n est pas succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==5){
			$ll=$_SESSION["cofo"];
			$query = mysql_query("UPDATE `fournisseur` SET `fax` = '$modi' WHERE `codefournisseur`= '$ll'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi.php");
}
else{
	header("location:modi-four.php");		
}			}else{
				echo '<script>alert("Modifié n est pas succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==6){
			$ll=$_SESSION["cofo"];			
			$query = mysql_query("UPDATE `fournisseur` SET `email` = '$modi' WHERE `codefournisseur`= '$ll'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi.php");
}
else{
	header("location:modi-four.php");		
}			}else{
				echo '<script>alert("Modifié n est pas succès");</script>';
			}	
		}
		elseif($_SESSION["n"]==7){
			$ll=$_SESSION["cofo"];			
			$query = mysql_query("UPDATE `fournisseur` SET `adresse` = '$modi' WHERE `codefournisseur`= '$ll'");
			if ($query) {
if ($autr == 'oui') {
	header("location:autr-modi.php");
}
else{
	header("location:modi-four.php");		
}			}else{
				echo '<script>alert("Modifié n est pas succès");</script>';
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
		        				<input type="radio" name="autr" value="oui" checked> 
		        				<label style="font-size: 14px;letter-spacing: 3px">Non</label>
		        				<input type="radio" name="autr" value="non"> 
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
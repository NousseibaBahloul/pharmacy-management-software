<?php 
session_start();
?>
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
$nuve=$_SESSION["nuve"];
$copr=$_POST['copr'];
$quantité=$_POST['quantité'];
$autre=$_POST['autre'];

$créer=$_POST['créer'];

if ($créer) {	
	if ($copr=="" or $quantité=="") {
    	echo '<script>alert("Entrer toutes les données");</script>';
    }else{
	 	$query=mysql_query("select * from produit where codeproduit = '$copr' ");
	    $rows = mysql_num_rows($query);
	    if ($rows==0) {
	    	echo '<script>alert("Ce produit n est existe pas déjà");</script>';
	    }else{ 
		    $query1=mysql_query("SELECT `quantité` FROM `produit` WHERE `codeproduit`='$copr'");
		    $rows1 = mysql_fetch_object($query1);
		    $qut=$rows1->quantité; 
	    	if ($qut<$quantité) {
	    		echo '<script>alert("Le quantité saisie est indisponible");</script>';
	    	}else{
				$query2=mysql_query("INSERT INTO `vente_produit` VALUES ('$nuve','$copr','$quantité',CURRENT_DATE())");
		        $q=mysql_query("SELECT `quantité` FROM `produit` WHERE `codeproduit`='$copr'");
		        $r=mysql_fetch_object($q);
	    		$qut=$r->quantité; 
		        $qqq=$qut-$quantité;
		        $qqqq=mysql_query("UPDATE `produit` SET `quantité`='$qqq' WHERE `codeproduit`='$copr'");
			    if ($autre == 'oui') {
			        $_SESSION["nuve"]=$nuve;
			        header("location:autr-prod2.php");
			    }else{
					$q1=mysql_query("SELECT `codeproduit`,`quantité` FROM `vente_produit` WHERE`n_vente`='$nuve' AND `date_vente`=CURRENT_DATE()");
					$ppa_total=0;
					while ($r1=mysql_fetch_object($q1)) {
						$code=$r1->codeproduit;
						$quantité=$r1->quantité;
						//echo $code.$quantité;
						$q2=mysql_query("SELECT `prix_ppa` FROM `produit` WHERE `codeproduit`='$code'");
						$r2=mysql_fetch_object($q2);
						$prix_ppa=$r2->prix_ppa; 			
						//echo $prix_ppa;
						$mult=$quantité*$prix_ppa;
						$ppa_total=$ppa_total+$mult;
						//echo $mult."<br/>";			
					}	
					$s=mysql_query("UPDATE `vente` SET `total_ppa`='$ppa_total' WHERE `n_vente`='$nuve'");	
						echo '<script>alert("Total PPA = '.$ppa_total.' ");</script>';		        		
    	    	}	
    		}
		}
	}
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Autre produit</title>
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
			<li> Gérer les ventes 
				<ul id="son">
					<li style="background-color: #606060;"><a href="crea-vent.php" style="color: #3eb408;font-weight: bold;"> Créer une vente </a></li>
					<li><a href="cons-vent.php"> Consulter une vente </a></li>									
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
		<h1 class="page"> Autre produit <h1>
        <div class="a">
        	<div class="b">
	        	<table class="table">
	        		<form action="" method="POST">
		        		<tr>
			        		<td colspan="2" style="font-size: 15px">
			        			<label style="font-size:18px;letter-spacing: 3px">Numéro de vente :</label>
			      
<?php 
$nuve=$_SESSION["nuve"];
echo $nuve;
?>			        				
			        		</td>
			        	</tr>	        			
		        		<tr>
		        			<td colspan=""><input type="text" name="copr" placeholder="Code produit" onkeypress="Numero()"></td>
		        			<td><input type="text" name="quantité" placeholder="Quantité" onkeypress="Numero()"></td> 
		        		</tr>
		        		<tr>
		        			<td><label style="font-size:20px;letter-spacing: 3px">Autre produit :</label></td>
		        			<td>
		        				<label style="font-size: 14px;letter-spacing: 3px">Oui</label>
		        				<input type="radio" name="autre" value="oui"> 
		        				<label style="font-size: 14px;letter-spacing: 3px">Non</label>
		        				<input type="radio" name="autre" value="non" checked> 
		        			</td> 
		        		</tr>
		        		<tr style="border-top: 1px solid #fefefe">
		        			<td colspan="2"><input type="submit" name="créer" value="Créer"></td>
		        		</tr>	        			
	        		</form>
	        	</table>        		
        	</div>
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
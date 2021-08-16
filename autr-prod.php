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
$idfa=$_SESSION["idfa"];
$copr=$_POST['copr'];
$quantité=$_POST['quantité'];
$autre=$_POST['autre'];

$ajouprod=$_POST['ajouprod']; 
if ($ajouprod) {
	if ($copr=="" or $quantité=="") {
    	echo '<script>alert("Entrer toutes les données");</script>';
    }else{
 	  	$query=mysql_query("select * from produit where codeproduit = '$copr' ");
    	$rows = mysql_num_rows($query);
    	if ($rows==1) {
    		$query1=mysql_query("SELECT * FROM `facture_produit` WHERE `idfacture`='$idfa' AND `codeproduit`='$copr'");
    		$rows1 = mysql_num_rows($query1);
    		if ($rows1 == 1) {
    			echo '<script>alert("Ce produit existe déjà dans ce facture");</script>';
    		}else{
		        $qq=mysql_query("SELECT `quantité` FROM `produit` WHERE `codeproduit`='$copr'");
		        $row18=mysql_fetch_object($qq);
	    		$c18=$row18->quantité; 
		        $qqq=$quantité+$c18;
		        $qqqq=mysql_query("UPDATE `produit` SET `quantité`='$qqq' WHERE `codeproduit`='$copr'");	
			    $query2=mysql_query("INSERT INTO facture_produit VALUES('$idfa','$copr','$quantité')");
			    $_SESSION["idfa"]=$idfa;
			    if ($autre=='oui') {
			    	header("location:autr-prod.php");
			    }else{
					$q=mysql_query("SELECT `codeproduit`,`quantité` FROM `facture_produit` WHERE`idfacture`='$idfa'");
					$prix_total=0;
					while ($row=mysql_fetch_object($q)) {
						$code=$row->codeproduit;
						$quantité=$row->quantité;
						//echo $code.$quantité;
						$p=mysql_query("SELECT `prix_ppa` FROM `produit` WHERE `codeproduit`='$code'");
						$r=mysql_fetch_object($p);
						$prix_ppa=$r->prix_ppa; 			
						//echo $prix_ppa;
						$mult=$quantité*$prix_ppa;
						$prix_total=$prix_total+$mult;
						//echo $mult."<br/>";			
					}
					$s=mysql_query("UPDATE `facture` SET `prix_total`='$prix_total' WHERE `idfacture`='$idfa'");	
					//echo $prix_total;			    	
			    	header("location:ajou-fact.php");			    
			    }    			
    		}   	
		}else{
			$_SESSION["copr"]=$copr;
			$_SESSION["qunt"]=$quantité;
			$_SESSION["autre"]=$autre;
			$_SESSION["idfa"]=$idfa;
			header("location:ajou-prod1.php");
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
	function Caractere()
	{
		if(event.keyCode == 91 || event.keyCode == 92 || event.keyCode == 93 || event.keyCode == 94 || event.keyCode == 95 || event.keyCode == 96 )
		{
			event.returnValue = false;
			alert("SVP , Entrer uniquement des caracteres !");
		}
		else if ((event.keyCode > 122) || (event.keyCode < 65 && event.keyCode != 32))
		{
			event.returnValue = false;
			alert("SVP , Entrer uniquement des caracteres !");
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
					<li style="background-color: #606060;"><a href="ajou-fact.php" style="color: #3eb408;font-weight: bold;"> Ajouter facture </a></li>
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
		<h1 class="page"> Autre produit <h1>
        <div class="a">
        	<div class="b">
        	    <table class="table">
		        	<form action="" method="POST">
		        		<tr>
			        		<td colspan="2" style="font-size: 15px">
			        			<label style="font-size:18px;letter-spacing: 3px">ID Facture :</label>
			      
<?php 
$idfa=$_SESSION["idfa"];
echo $idfa;
?>			        				
			        		</td>
			        	</tr>		        		        		
		        		<tr>
		        		    <td><input type="text" name="copr" placeholder="Code produit" onkeypress="Numero()"></td>  		
		        			<td><input type="text" name="quantité" placeholder="Quantité" onkeypress="Numero()"></td>
		        		</tr>
		        		<tr>
		        			<td><label style="font-size:20px;letter-spacing: 3px;font-weight: bold;">Autre produit :</label></td>
		        			<td style="">
		        				<label style="font-size: 14px;letter-spacing: 3px">Oui</label>
		        				<input type="radio" name="autre" value="oui"> 
		        				<label style="font-size: 14px;letter-spacing: 3px">Non</label>
		        				<input type="radio" name="autre" value="non" checked> 
		        			</td>
		        		</tr>		        				        		 		        		
		        		<tr style="border-top: 1px solid #fefefe"> 
		        			<td colspan="2"><input type="submit" name="ajouprod" value="Ajouter produit"></td>
		        		</tr>		        	
		        	</form>       	    	
        	    </table>       		
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
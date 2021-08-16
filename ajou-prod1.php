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
$copr=$_SESSION["copr"];
$quantité=$_SESSION["qunt"];
$autre=$_SESSION["autre"];
$idfa=$_SESSION["idfa"];

$nom=$_POST['nom'];
$famille=$_POST['famille'];
$dosage=$_POST['dosage'];
$forme=$_POST['forme'];
$prix=$_POST['prix'];
$expiré=$_POST['expiré'];

$ajouter=$_POST['ajouter'];
if ($ajouter) {
	if ($nom=="" or $famille=="" or $dosage=="" or $forme=="" or $prix=="" or $expiré=="") {
    	echo '<script>alert("Entrez toutes les données");</script>';
    }
    else{
		$query=mysql_query("INSERT INTO produit VALUES('$copr','$forme','$famille','$prix','$dosage','','$nom','$expiré')");
		if ($query) {
		    $qq=mysql_query("SELECT `quantité` FROM `produit` WHERE `codeproduit`='$copr'");
		    $row18=mysql_fetch_object($qq);
	    	$c18=$row18->quantité; 
		    $qqq=$quantité+$c18;
		    $qqqq=mysql_query("UPDATE `produit` SET `quantité`='$qqq' WHERE `codeproduit`='$copr'");			
			$q=mysql_query("INSERT INTO facture_produit VALUES('$idfa','$copr','$quantité')");
		    if ($autre=="oui") {
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
		}else{
		    echo '<script>alert("Pas ajouté avec succès");</script>';
		}        	          	
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter Produit</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/ajou-fourr.css">
    <link rel="shortcut icon" href="imgs\3.png">
<script>
	function Numero()
	{
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
                    <li style="background-color: #606060;"><a href="ajou-prod.php" style="color: #3eb408;font-weight: bold;"> Ajouter produit </a></li>
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
		<h1 class="page"> Ajouter Produit </h1>
	 <div class="a">
            <div class="b">
            	<form action="" method="POST">
	                <table class="table">
	                    <tr style="border-bottom: 1px solid #fefefe">
	                        <td colspan="2"><label style="font-size:18px;letter-spacing: 3px;font-weight: bold;">Code produit :</label>
<?php 
	echo $copr;
?>	                        	
	                        </td>
	                    </tr>
	                    <tr>
	                        <td><input type="text" name="nom" placeholder="Nom" onkeypress="Caractere()"></td>
	                        <td><input type="text" name="famille" placeholder="Nom de famille" onkeypress="Caractere()"></td>
	                    </tr>
	                    <tr>                
	                        <td><input type="text" name="forme" placeholder="Forme" onkeypress="Caractere()"></td>
	                        <td><input type="text" name="prix" placeholder="Prix ppa"></td>
	                    </tr>
	                    <tr>            
	                        <td colspan="2"><input type="text" name="dosage" placeholder="Dosage"></td>
	                    </tr> 	                    
				        <tr>
				        	<td><label style="font-size:20px;letter-spacing: 3px;">Date Expiré :</label></td>
				        	<td style=""><input type="Date" name="expiré"></td>
				        </tr>                  
	                    <tr style="border-top: 1px solid #fefefe">              
	                        <td colspan="2"><input type="submit" name="ajouter" value="Ajouter"> </td>
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
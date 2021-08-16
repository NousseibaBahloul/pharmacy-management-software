<?php  
session_start();
?>
<?php
$alert=$_POST['alert'];
//echo $alert;
//	$_SESSION['al']=$alert;

$créer=$_POST['créer'];

if ($créer) {
	$alert=$_SESSION['al'];

	//echo $_SESSION['ale'];
echo $alert;
	$_SESSION['ale']=$alert;
	header("location:bon-comm1.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock alert</title>
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
                    <li style="background-color: #606060;"><a href="affi-stoc.php" style="color: #3eb408;font-weight: bold;"> Afficher le stock alerte </a></li>
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
		<h1 class="page"> Afficher le stock alerte <h1>
        <div class="a" style="margin-left: 160px">
        	<table class="table">
        		<form method="POST" action="">
			        <tr>
				        <td style="width: 35%">
				        	<label style="font-size: 20px;margin-left: 30px"> N° de Stock alerte  :</label>
						</td>
						<td style="width: 40%">
				        	<input type="text" name="alert" placeholder="N° de Stock alerte" style="width: 80%;margin-right: 40px;height: 10px">
	        			</td>
						<td style="width: 25%">
				        	<input type="submit" name="afficher" value="Afficher" style="width: 140px;font-size: 16px">
	        			</td>	        			
	        		</tr>
	        		<tr>        		
		        		<td colspan="3"><input type="submit" name="créer" value="Créer bon de commande"> </td>
		        	</tr>
        		</form>
        	</table>
        	<br>
			       
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
$alert=$_POST['alert'];
$query=mysql_query("SELECT * FROM `produit` WHERE `quantité`<='$alert'");

	echo "<div class='copr1'>Code</div>"."<div class='nom1'>Nom produit</div>"."<div class='famille1'>Nom famille</div>"."<div class='dosage1'>Dosage</div>"."<br/>"."<div class='forme1'>Forme</div>"."<div class='prix_ppa1'>Prix ppa</div>"."<div class='date_expiré1'>Date_expirée</div>"."<div class='quantité1'>Quantité</div>"."<br/>";
while ($row=mysql_fetch_object($query)) {

    $copr=$row->codeproduit;
    $nom=$row->nom;
    $nom_famille=$row->nom_famille;
    $dosage=$row->dosage;
    $forme=$row->forme;
    $prix_ppa=$row->prix_ppa;
    $date_expiré=$row->date_expiré;
	$quantité=$row->quantité;



	echo "<div class='copr'>$copr</div>"."<div class='nom'>$nom</div>"."<div class='famille'>$nom_famille</div>"."<div class='dosage'>$dosage</div>"."<br/>"."<div class='forme'>$forme</div>"."<div class='prix_ppa'>$prix_ppa</div>"."<div class='date_expiré'>$date_expiré</div>"."<div class='quantité'>$quantité</div>"."<br/>";

}
$_SESSION['al']=$alert;
//echo $_SESSION['al'];
?>

<style>
.copr1{
    background-color: #990000;
    padding: 0px 5px ;
    margin-left:20px;
    width: 50px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;    
    font-weight: normal;
    color: #fff;
    
}
.nom1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:85px;
    width: 200px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.famille1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:300px;
    width: 200px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}.dosage1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:515px;
    width: 180px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
}

.forme1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:85px;
    width: 230px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}
.prix_ppa1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:330px;
    width: 120px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-weight: normal;
    font-size: 16px;

}
.date_expiré1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:465px;
    width: 120px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;     

} 
.quantité1{
    background-color: #990000;
    color: #fff;
    padding: 0px 5px ;
    margin-left:600px;
    width: 70px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-weight: normal;
    font-size: 16px;
    border-radius: 5px;

}
.copr{
    background-color: #990000;
    padding: 0px 5px ;
    margin-left:20px;
    width: 50px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;    
    font-weight: normal;
    color: #fff;
    
}
.nom{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:85px;
    width: 200px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.famille{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:300px;
    width: 200px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}.dosage{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:515px;
    width: 180px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
}

.forme{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:85px;
    width: 230px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}
.prix_ppa{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:330px;
    width: 120px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-weight: normal;
    font-size: 16px;

}
.date_expiré{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:465px;
    width: 120px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

} 
.quantité{
    background-color: #990000;
    color: #fff;
    padding: 0px 5px ;
    margin-left:600px;
    width: 70px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-weight: normal;
    font-size: 16px;
    border-radius: 5px;
}
</style>
      		
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
<?php 
session_start();
?>
<?php 
	$afficher=$_POST['afficher'];
	$nofa=$_POST['nofa'];
	if ($afficher) {		
		$_SESSION["nofa"]=$nofa;
		header("location:list-fami1.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Liste familles</title>
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
					<li style="background-color: #606060;"><a href="list-fami.php" style="color: #3eb408;font-weight: bold;"> Liste des familles </a></li>
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
		<h1 class="page"> Liste des familles <h1>
        <div class="a" style="margin-left: 160px">
        	<table class="table">
        		<form method="POST" action="">
			        <tr>
				        <td style="width: 35%">
				        	<label style="font-size: 20px;margin-left: 30px"> Nom de famille :</label>
						</td>
						<td style="width: 40%">
				        	<input type="text" name="nofa" placeholder="Nom de famille" style="width: 80%;margin-right: 40px;height: 10px">
	        			</td>
						<td style="width: 25%">
				        	<input type="submit" name="afficher" value="Afficher" style="width: 140px;font-size: 16px">
	        			</td>	        			
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
$query=mysql_query("SELECT DISTINCT `nom_famille` FROM `produit`/* ORDER BY `nom_famille`*/");

	echo "<div class='famille1'>Nom de famille</div>"."<br/>";
while ($row=mysql_fetch_object($query)) {

    $fam=$row->nom_famille;

	//	echo $fam;
	
	
	echo "<div class='famille'>$fam</div>"."<br/>";
/*"<div class='affi'><form action='' method='POST'><input type='submit' name='afficher' value='Afficher' class='aff'/></form></div>".*/

}
?>

<style>
.famille1{
    background-color: #78a83e;
    padding: 0px 5px ;
    margin-left:200px;
    width: 300px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-radius: 5px;
    font-weight: normal;
    color: #fff;
    
}


.famille{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:200px;
    width: 300px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-radius: 5px;
    font-weight: normal;
    
}

/*.affi{
	background-color: #3c3c3c;
	color: #fff;
    padding: 0px 0px ;
    margin-left:500px;
    width: 100px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-radius: 5px;

}
.aff{
	background-color: #3c3c3c;
	color: #fff;
    padding: 0px 0px ;
    width: 100px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    font-weight: normal;
    border-radius: 5px;
    border: none;
    cursor: pointer;

}*/

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
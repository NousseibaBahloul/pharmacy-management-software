<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste ventes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="imgs\3.png">
</head>
<body class="body">
	<nav class="menu">
		<!--span class="close-btn">X</span-->
		<ul id="father">
			<h1 class="tache"> Les tâches </h1>
			<li> Gérer les ventes 
				<ul id="son">
					<li><a href="crea-vent.php"> Créer une vente </a></li>
					<li style="background-color: #606060;"><a href="cons-vent.php" style="color: #3eb408;font-weight: bold;"> Consulter une vente </a></li>									
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
		<h1 class="page"> Consulter une vente <h1>
        <div class="a" style="margin-left: 160px">
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
$query=mysql_query("SELECT * FROM `vente_produit` WHERE `n_vente`='$nuve'");

	echo "<div class='nuve1'>N° da vente</div>"."<div class='copr1'>Code de produit</div>"."<div class='quantité1'>Quantité</div>"."<br/>";
while ($row=mysql_fetch_object($query)) {

    $nuve=$row->n_vente;
    $copr=$row->codeproduit;
    $quantité=$row->quantité;

	echo "<div class='nuve'>$nuve</div>"."<div class='copr'>$copr</div>"."<div class='quantité'>$quantité</div>"."<br/>";
	
	
}
?>

<style>
.nuve1{
    background-color: #78a83e;
    padding: 0px 5px ;
    margin-left:120px;
    width: 140px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;    
    font-weight: normal;
    color: #fff;
    
}
.copr1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:275px;
    width: 140px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.quantité1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:430px;
    width: 140px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;     

}

.nuve{
    background-color: #3c3c3c;
    padding: 0px 5px ;
    margin-left:120px;
    width: 140px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;    
    font-weight: normal;
    color: #fff;
    
}
.copr{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:275px;
    width: 140px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.quantité{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:430px;
    width: 140px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;   
}

</style> 
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
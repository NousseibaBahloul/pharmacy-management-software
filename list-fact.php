<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste factures</title>
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
					<li style="background-color: #606060;"><a href="list-fact.php" style="color: #3eb408;font-weight: bold;"> Consulter la liste des factures </a></li>	
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
		<h1 class="page"> Liste des factures <h1>
        <div class="a" style="margin-left: 160px">
        	<table class="table">
        		<form method="POST" action="">
			        <tr>
				        <td style="width: 35%">
				        	<label style="font-size: 20px;margin-left: 30px"> ID de facture :</label>
						</td>
						<td style="width: 40%">
				        	<input type="text" name="idfa" placeholder="ID de facture" style="width: 80%;margin-right: 40px;height: 10px" onkeypress="Numero()">
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
$query=mysql_query("SELECT * FROM `facture`");

	echo "<div class='id1'>ID Facture</div>"."<div class='cofo1'>Code fournisseur</div>"."<div class='date1'>Date facture</div>"."<div class='prix1'>Prix total</div>"."<br/>";
while ($row=mysql_fetch_object($query)) {

    $id=$row->idfacture;
    $cofo=$row->codefournisseur;
    $date_facture=$row->date_facture;
    $prix_total=$row->prix_total;

	echo "<div class='id'>$id</div>"."<div class='cofo'>$cofo</div>"."<div class='date'>$date_facture</div>"."<div class='prix'>$prix_total</div>"."<br/>";
/*."<div class='affi'><input type='submit' name='afficher' value='Afficher' class='aff'/></div>"	*/

}
$idfa=$_POST['idfa'];
$afficher=$_POST['afficher'];
if ($afficher) {
	$query=mysql_query("select * from facture where idfacture = '$idfa' ");
   $rows = mysql_num_rows($query);
    if ($rows==0) {	
    	echo '<script>alert("Ce ID Facture n existe pas");</script>';
	}else{
		$_SESSION['idfa']=$idfa;
		header("location:facture.php");		
	}
}
?>

<style>
.id1{
    background-color: #78a83e;
    padding: 0px 5px ;
    margin-left:80px;
    width: 110px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;    
    font-weight: normal;
    color: #fff;
    
}
.cofo1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:205px;
    width: 130px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.date1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:350px;
    width: 140px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}.prix1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:505px;
    width: 150px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;      

}

.id{
    background-color: #3c3c3c;
    padding: 0px 5px ;
    margin-left:80px;
    width: 110px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;    
    font-weight: normal;
    color: #fff;
    
}
.cofo{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:205px;
    width: 130px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.date{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:350px;
    width: 140px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}
.prix{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:505px;
    width: 150px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;       
}
/*.affi{
	background-color: #78a83e;
	color: #fff;
    padding: 0px 0px ;
    margin-left:600px;
    width: 100px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-radius: 5px;

}
.aff{
	background-color: #78a83e;
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
    <a href="" id="about"><input type="submit" name="" value="LogOut" ></a>

</div>
</form>
 	</div>
    <script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
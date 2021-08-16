<!DOCTYPE html>
<html>
<head>
	<title>Liste fournisseurs</title>
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
					<li><a href="modi-four.php"> Modifier fournisseur </a></li>
					<li style="background-color: #606060;"><a href="list-four.html" style="color: #3eb408;font-weight: bold;"> Consulter la liste des fournisseurs </a></li>									
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
		<h1 class="page"> Liste des fournisseurs <h1>
        <div class="a" style="margin-left: 160px">
            <!--div class="b" style="padding-top: 20px;padding-bottom: -10px"-->
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
$query=mysql_query("SELECT * FROM `fournisseur`");

    echo "<div class='cofo1'>Code</div>"."<div class='nom1'>Nom fournisseur</div>"."<div class='prénom1'>Prénom fournisseur</div>"."<div class='ville1'>Ville</div>"."<div class='tel1'>Téléphon</div>"."<br/>"."<div class='email1'>Email</div>"."<div class='fax1'>Fax</div>"."<div class='adresse1'>Adresse</div>"."<br/>";

while ($row=mysql_fetch_object($query)) {

    $cofo=$row->codefournisseur;
    $nom=$row->nom;
    $prénom=$row->prénom;
    $ville=$row->ville;
    $tel=$row->téléphon;
    $fax=$row->fax;
    $adresse=$row->adresse;
    $email=$row->email;


	echo "<div class='cofo'>$cofo</div>"."<div class='nom'>$nom</div>"."<div class='prénom'>$prénom</div>"."<div class='ville'>$ville</div>"."<div class='tel'>$tel</div>"."<br/>"."<div class='email'>$email</div>"."<div class='fax'>$fax</div>"."<div class='adresse'>$adresse</div>"."<br/>";

}
?>

<style>

.cofo1{
    background-color: #78a83e;
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
    width: 160px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.prénom1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:260px;
    width: 160px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}.ville1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:435px;
    width: 150px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
}
.tel1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:600px;
    width: 90px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}

.email1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:85px;
    width: 250px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-weight: normal;
    font-size: 16px;

}
.fax1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:350px;
    width: 90px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}
.adresse1{
    background-color: #78a83e;
    color: #fff;
    padding: 0px 5px ;
    margin-left:455px;
    width: 210px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

} 

.cofo{
    background-color: #3c3c3c;
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
    width: 160px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;


}
.prénom{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:260px;
    width: 160px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}.ville{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:435px;
    width: 150px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
}
.tel{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:600px;
    width: 90px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}

.email{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:85px;
    width: 250px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-weight: normal;
    font-size: 16px;

}
.fax{
    background-color: #a2a2a2;
    padding: 0px 5px ;
    margin-left:350px;
    width: 90px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;

}
.adresse{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:455px;
    width: 210px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

} 

</style>     		
        	<!--/div-->
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


<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bon de commande</title>
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
		<h1 class="page"> Bon de commande <h1>
        <div class="a">
        	<div class="b">
        		<form action="" method="POST">
		        	<table class="table">
		        		<tr>
		        			<td colspan="2"><input type="text" name="idbon" placeholder="ID de bon" autofocus="" onkeypress="Numero()"></td>
		        		</tr>
		        		<tr>
		        		    <td><label style="font-size:20px;word-spacing: 3px"> Date de bon :  </label></td>  		
		        			<td><input type="date" name="dabon"></td>
		        		</tr> 		        				        		
		        		<tr>
		        			<td><input type="text" name="nofo" placeholder="Nom fournisseur" onkeypress="Caractere()"></td>
		        			<td><input type="text" name="prfo" placeholder="Prénom fournisseur" onkeypress="Caractere()"></td>
		        		</tr>
		        		<tr style="border-top: 1px solid #fefefe">
		        			<td colspan="2">
<br>
<?php 
$da=$_SESSION['da'];
//echo $da;
$connect= mysql_connect("localhost","nousseiba","17031999");
if($connect){
    $db=mysql_select_db("pharmacie");
    if($db){}else{
    	echo '<script>alert("La base de données n est pas connectée");</script>';
    }  
}else{
    echo '<script>alert("Le serveur local n était pas connecté");</script>';
} 
$query=mysql_query("SELECT * FROM `produit` WHERE `date_expiré`<='$da'");
	echo "<div class='nom1'>Nom produit</div>"."<div class='dosage1'>Dosage</div>"."<br/>";
while ($row=mysql_fetch_object($query)) {

  //  $copr=$row->codeproduit;
    $nom=$row->nom;
    $dosage=$row->dosage;
	echo "<div class='nom'>$nom</div>"."<div class='dosage'>$dosage</div>"."<div class='quantité'><from><input placeholder='Quantité' class='input'></input></from></div>"."<br/>";

}


	$idbon=$_POST['idbon'];
	$dabon=$_POST['dabon'];	
	$nofo=$_POST['nofo'];
	$prfo=$_POST['prfo'];
	
	$envoyer=$_POST['envoyer'];
if ($envoyer) {
	if ($idbon=="" or $dabon=="" or $nofo=="" or $prfo=="") {
		echo '<script>alert("Entrer toutes les données");</script>';
	}else{
		$query=mysql_query("select * from bon_de_commande where id_bon = '$idbon' ");
    	$rows = mysql_num_rows($query);
    	if ($rows==1) {
    		echo '<script>alert("Ce id est existe déjà");</script>';
    	}else{ 
    		$query1=mysql_query("select * from fournisseur where nom = '$nofo' and prénom='$prfo' ");
    		$rows1 = mysql_num_rows($query1);
    		if ($rows1==0) {
    			echo '<script>alert("Le fournisseur n existe pas");</script>';
    		}else{
	    	//	$query2=mysql_query("INSERT INTO `bon_de_commande` VALUES ('$idbon','$dabon','$nofo','$prfo')");
    		//	
				$query2=mysql_query("SELECT `email` FROM `fournisseur` WHERE `nom`='$nofo' AND `prénom`='$prfo'");
				$row2=mysql_fetch_object($query2);
				$email=$row2->email;
			//	echo $email;
				$subject="Bon de commande des produits";
				$message="message";
				$admin="nousseiba.bahloul@gmail.com";
				$header="from:".$admin;
				mail($email,$subject,$message,$header);
				echo '<script>alert("Envoyé avec succès");</script>';

    		}	  		
    	}
	}
}

?>	
<style>
.nom1{

    background-color: #339207;
    color: #fff;
    padding: 0px 5px ;
    margin-left:40px;
    width: 180px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.dosage1{
    background-color: #339207;
    color: #fff;
    padding: 0px 5px ;
    margin-left:240px;
    width: 180px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

}	
.nom{

    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:40px;
    width: 180px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.dosage{
    background-color: #3c3c3c;
    color: #fff;
    padding: 0px 5px ;
    margin-left:240px;
    width: 180px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

}
.quantité{
    margin-left:450px;
    width: 100px;
    height: 25px;
    text-align: center;
    margin-top: -25px;
    font-size: 16px;
    font-weight: normal;
    border: none;
    border-radius: 5px;

}
.input{
   background-color: #fff;
    width: 100px;
    height: 25px;
    text-align: center;
    font-size: 16px;
    font-weight: normal;
    border: none;
    border-radius: 5px;

}	
</style>
        						
		        			</td>
		        		</tr>		        		
		        		<tr style="border-top: 1px solid #fefefe">        		
		        			<td colspan="2"><input type="submit" name="envoyer" value="Envoyer"> </td>
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
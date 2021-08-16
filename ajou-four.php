<!DOCTYPE html>
<html>
<head>
	<title>Ajouter fournisseur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="shortcut icon" href="imgs\3.png">
	<script src="js/script.js" type="text/javascript"></script>
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
 /*   function Email()
    {
    	var a = document.myForm.email.value;
    	if (a.indexOf('@')<=0) 
    	{
    		document.getElementById('Message').innerHTML="**Invalid @ position";
    		return false;
    	}
    	if ((a.charAt(a.lenght=4)!='.') && (a.charAt(a.lenght=3)!='.')) 
    	{
    		document.getElementById('Message').innerHTML="**Invalid . position 4";
    	}
    }*/
    
</script>

</head>
<body class="body">
	<nav class="menu">
		<!--span class="close-btn">X</span-->
		<ul id="father">
		  	<h1 class="tache"> Les tâches </h1>
			<li> Gérer les fournisseurs 
				<ul id="son">
					<li style="background-color: #606060;"><a href="ajou-four.php" style="color: #3eb408;font-weight: bold;"> Ajouter fournisseur </a></li>
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
		<h1 class="page"> Ajouter fournisseur <h1>
        <div class="a">
        	<div class="b">
	        	<table class="table">
	        		<form action="" method="POST">
		        		<tr style="border-bottom: 1px solid #fefefe">
		        			<td colspan="2"><input type="text" name="cofo" placeholder="Code fournisseur" autofocus="" onkeypress="Numero()">
		        			</td>
		        		</tr>
		        		<tr>
		        			<td><input type="text" name="nom" placeholder="Nom" onkeypress="Caractere()"> </td>
		        			<td><input type="text" name="prénom" placeholder="Prénom" onkeypress="Caractere()"> </td>
		        		</tr>
		        		<tr>      		
		        			<td><input type="text" name="tel" placeholder="Numéro de téléphone" onkeypress="Numero()"> </td>
		        			<td><input type="text" name="fax" placeholder="Fax" onkeypress="Numero()"> </td>
		        		</tr>
		        		<tr>	
		        			<td colspan="2"><input type="text" name="ville" placeholder="Ville"> </td>
		        		</tr>		        		 
		        		<tr>       		
		        			<td colspan="2"><input type="text" name="email" placeholder="Email" > </td>
		        		</tr>
		        		<tr>        		
		        			<td colspan="2"><input type="text" name="adresse" placeholder="Adresse"> </td>
		        		</tr>
		        		<tr style="border-top: 1px solid #fefefe">        		
		        			<td colspan="2"><input type="submit" name="ajouter" value="Ajouter"> </td>
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
$cofo=$_POST['cofo'];
$nom=$_POST['nom'];
$prénom=$_POST['prénom'];
$tel=$_POST['tel'];
$fax=$_POST['fax'];
$ville=$_POST['ville'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];

$submit=$_POST['ajouter'];
if ($submit) {
	if ($cofo=="" or $nom=="" or $prénom=="" or $tel=="" or $fax=="" or $ville=="" or $email=="" or $adresse=="") {
    	echo '<script>alert("Entrez toutes les données");</script>';
    }
    else{
    	$query=mysql_query("select * from fournisseur where codefournisseur = '$cofo' ");
    	$rows = mysql_num_rows($query);
        if ($rows==1) {
        	echo '<script>alert("Le fournisseur est existe déja");</script>';
        }
        else{
		$query1=mysql_query("SELECT * FROM `fournisseur` WHERE `nom`='$nom' AND `prénom`='$prénom'");
    	$rows1 = mysql_num_rows($query1);
        if ($rows1==1) {
        	echo '<script>alert("Il y a déjà un fournisseur de la même nom et prénom");</script>';
        }else{
		    $query=mysql_query("INSERT INTO fournisseur VALUES('$cofo','$nom','$ville','$tel','$fax','$email','$adresse','$prénom')");
		    if ($query) {
		        echo '<script>alert("Ajouté avec succès");</script>';
		    }
		    else{
		        echo '<script>alert("Pas ajouté avec succès");</script>';
		    }        	
        }        	

    
		    
		}
    }
}
?>
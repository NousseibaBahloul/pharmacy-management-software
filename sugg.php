<!DOCTYPE html>
<html>
<head>
	<title>Vos suggestions</title>
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
		<h1 class="page"> Vos suggestions <h1>
        <div class="a" style="margin-left: 200px">
        	<p class="p" style="font-size: 17px">
        		Monisieur Administrateur ;<br>
        		Nons somme prêts à cette page vous spécifiquement, si vous avez des suggestions pour ce site, vous écrit et envoyé à etas-unis, et sera considéré comme par le programmeur de page.
        	</p>
        	<table style="" class="t">
        		<tr height="60px">
        			<td width="25%">
        				<label>Email :</label>
        			</td>
        			<td style="text-align: center;">
        				<input type="text" name="" placeholder="Email">
        			</td>
        		</tr>
        		<tr height="60px">
        			<td>
        				<label>Subject :</label>
        			</td>
        			<td style="text-align: center;">
        				<input type="text" name="" placeholder="Subject">
        			</td>
        		</tr>
        		<tr height="150px">
        			<td style="vertical-align: top;padding-top: 10px">
        				<label >Contenu :</label>
        			</td>
        			<td style="text-align: center;">
        				<textarea rows="6" cols="60"></textarea>
        			</td>
        		</tr>
		        <tr style="text-align: center;">        		
		        	<td colspan="2" ><input type="submit" name="" value="Envoyer"> </td>
		        </tr>        		
        	</table>
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


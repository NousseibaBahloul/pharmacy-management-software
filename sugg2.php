<!DOCTYPE html>
<html>
<head>
	<title>Vos suggestions</title>
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
					<li><a href="cons-vent.php"> Consulter une vente </a></li>									
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
		<h1 class="page"> Vos suggestions <h1>
        <div class="a" style="margin-left: 200px">
        	<p class="p" style="font-size: 17px">
        		Monisieur Vendeur ;<br>
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

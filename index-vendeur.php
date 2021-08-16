<?php
    include("include1/db1.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css\style1.css"> 
  <link rel="shortcut icon" href="imgs\3.png">

</head>

<body>
  <div class="form">
    <table>
      <tr>
        <td style="padding-right:0px "><img src="imgs\3.png" width="60px" height="60px"></td>
        <td><h1 style=""> Pharmacie . NET</h1></td>
      </tr>
    </table>
       
      <ul class="tab-group">
        <li class="tab active"><a href="index-administrateur.php">Administrateur</a></li>
        <li class="tab"><a href="index-vendeur.php">Vendeur</a></li>
      </ul>
        <form action="include1/checklog1.php" method="post">
            <div>
		        <!--i class="fas fa-lock"></i-->  
		        <input type="password" name="password" required autocomplete="off" placeholder="Mot de passe" />            
            </div> 	
<br>
          <input type="submit" name="submit" class="button button-block" value="Login"/>
        </form> 

  </div>

</body>
</html>
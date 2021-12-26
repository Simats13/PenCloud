<?php
session_start();

if(isset($_POST['formconnexion'])) {
  $bdd = new PDO('mysql:host=localhost;dbname=pencloud', 'root', 'root');
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = htmlspecialchars($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
	  $requser = $bdd->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	  $requser->execute(array($mailconnect, $mdpconnect));
	  $userexist = $requser->rowCount();
	  if($userexist == 1) {
		 $userinfo = $requser->fetch();
		 $_SESSION['id'] = $userinfo['id'];
		 $_SESSION['username'] = $userinfo['username'];
		 $_SESSION['password'] = $userinfo['password'];
		 
		} else {
		 $erreur = "Mauvais mail ou mot de passe !";
	  }			
		if($userinfo['administrateur'] == 1){			
			header("Location: admin.php");
	  }
   } else {
	  $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pen'Cloud</title>
  <link href="../css/main.css" rel="stylesheet">
</head>
<body>

  <img id="logo" src="../images/logo_pencloud.png">

  <ul id="login">
    <li style="float:right"><a href="../index.php">Accueil</a></li>
  </ul>

  <div id="container">
    <h1>Connectez-vous</h1>
    <div>
      <form method="POST" action="">
      <input type="text" name="mailconnect" id="url" placeholder="username" required>
    </div>
    <div>
      <input type="password" name="mdpconnect" id="email" placeholder="mot de passe" required>
    </div>
    
    <button type="submit" name="formconnexion">Se connecter</button>
    </form>
  </div>
  
</body>

<footer>
        <p id="footer">PenCloud ©2021</p>
        <div id="intech" ><img class="logo_footer" src="../../data/images/intech.png" alt="intech"></div>
        <div id="aen"><img class="logo_footer" src="../../data/images/aen.png" alt="aen"></div>
    </footer>
</html>
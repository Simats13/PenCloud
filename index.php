<?php 
if(isset($_POST['post'])){
  $url = htmlspecialchars(trim($_POST['url']));
  $email = htmlspecialchars(trim($_POST['email']));
  
  //exec("./script.sh $url $email > /dev/null 2>/dev/null &");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pen'Cloud</title>
  <link href="./css/main.css" rel="stylesheet">
</head>
<body>

  <img id="logo" src="../images/logo_pencloud.png">

  <ul id="login">
    <li style="float:right"><a href="../data/pages/login.php">Se connecter</a></li>
  </ul>

  <div id="container">
    <h1>Entrez les informations suivantes pour analyser votre site</h1>
    <div>
      <form method="post">
      <input type="text" id="url" placeholder="URL de votre site" required>
    </div>
    <div>
      <input type="email" id="email" placeholder="Votre e-mail" required>
    </div>
    
    <button type="submit" name="post">Analyser</button>
    </form>
  </div>
  
</body>

<footer>
        <p id="footer">PenCloud ©2021</p>
        <div id="intech" ><img class="logo_footer" src="../images/intech.png" alt="intech"></div>
        <div id="aen"><img class="logo_footer" src="../images/aen.png" alt="aen"></div>
    </footer>
</html>
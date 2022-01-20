<?php 
date_default_timezone_set('Europe/Paris');
include('functions/main-functions.php'); 
$db = ConnexionDB();


function user_exist($url_parsed){
  $db = ConnexionDB();
  $a = [
      'url' => $url_parsed,
  ];

  $sql = "SELECT * FROM website WHERE url = :url ";

  $req = $db->prepare($sql);
  $req->execute($a);
  $exist = $req->rowCount($sql);
  return $exist;
  $req->closeCursor();
 

}
if(isset($_POST['post'])){
  $url = htmlspecialchars(trim($_POST['url']));
  $email = htmlspecialchars(trim($_POST['email']));

  $arr = parse_url($url);

  $url_parsed=strval($arr['host']);

  

  $date = date('Y-m-d H:i:s');
  $compteur = 0;

  $p = [
    'url_parsed' => $url_parsed,
    'date' => $date,
    'compteur' => $compteur,
];

  if(user_exist($url_parsed) == 0){
    $sql = "INSERT INTO website (url,date,compteur) VALUES (:url_parsed, :date, :compteur)";
    $req = $db->prepare($sql);
    $req->execute($p);
    $existe = 0;
    exec("./script.sh $url $email > /dev/null 2>/dev/null &");
  }else{
    $sql = ("UPDATE website SET compteur=compteur + 1 WHERE url='$url_parsed' ");  
    $req = $db->prepare($sql);
    $req->execute($p);
    $existe = 1;
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
  <link href="./css/main.css" rel="stylesheet">
  
</head>
<body>

  <img id="logo" src="../images/logo_pencloud.png">

  <ul id="login">
    <li style="float:right"><a href="../admin/login.php">Se connecter</a></li>
  </ul>

  <div id="container">
    <h1>Entrez les informations suivantes pour analyser votre site</h1>
    <div>
      <form method="post">
      <input type="text" id="url" name="url"placeholder="URL de votre site" required>
    </div>
    <div>
      <input type="email" id="email" name="email" placeholder="Votre e-mail" required>
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
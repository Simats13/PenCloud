<?php
session_start();

include('includes/header.php'); 
include('includes/main-functions.php'); 
//SI UNE SESSION EXISTE DEJA, AFFICHER L'ADMIN
if(isset($_SESSION['admin'])){
    header("Location:index.php");
}



//FONCTION PERMETTANT DE SAVOIR SI L'UTILISATEUR EST UN ADMINISTRATEUR
function is_admin($email,$password){
  $db = ConnexionDB();

  $a = [
      'email' => $email,
      'password' => sha1($password)
  ];

  $sql = "SELECT * FROM admin WHERE email = :email AND password = :password";

  $req = $db->prepare($sql);
  $req->execute($a);
  $exist = $req->rowCount($sql);
  return $exist;
  $req->closeCursor();
  $db = null;

}






?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Se Connecter</h1>
                <?php
                    if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    

                    $errors = [];

                    if(empty($email) || empty($password)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis!";
                    }else if(is_admin($email,$password) == 0){
                        $errors['exist']  = "Mauvais couple email/mot de passe. Veuillez réessayer !";
                    }

                    if(!empty($errors)){
                        ?>
                        <div class="card red">
                            <div class="card-content white-text">
                                <?php
                                    foreach($errors as $error){
                                        echo $error."<br/>";
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }else{
                        $_SESSION['admin'] = $email;
                        header("Location:index.php");
                    }

                }
                ?>
              </div>

                <form class="user" method="POST">

                    <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Entrez votre E-Mail">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Mot de passe">
                    </div>
            
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block"> Connexion </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/main-functions.php'); 
$db = ConnexionDB();

function get_website(){
  $db = ConnexionDB();

  $req = $db->query("
      SELECT  *
      FROM website
      ORDER BY website.compteur DESC
  
  ");

  $result =[];
  while($rows = $req->fetchObject()){
      $result[] = $rows;
  }

  return $result;
  $req->closeCursor();
  $db = null;
}

$compteur = get_website();
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Portail Azure
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button> -->
    </h6>
  </div>

  <div class="card-body">
  <script type="text/javascript">   
    function Redirect() 
    {  
        window.location="http://portal.azure.com"; 
    } 
    document.write("Vous allez être redirigé vers le portail d'Azure"); 
    setTimeout('Redirect()', 5000);   
</script>

</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
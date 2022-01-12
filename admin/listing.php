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
    <h6 class="m-0 font-weight-bold text-primary">Listing de tous les sites
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button> -->
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom du site</th>
            <th>Nombre d'attaque</th>
          </tr>
        </thead>
        <tbody>
     <?php foreach ($compteur as $test) { ?>
          <tr>
            <td><?= $test->id?></td>
            <td><?= $test->url?></td>
            <td><?= $test->compteur?></td>
           
          </tr>
        <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
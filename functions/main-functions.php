<?php 

    

    function ConnexionDB(){
    $dbhost  = 'pencloud-server.mysql.database.azure.com';
    $dbname  = 'pencloud';
    $dbuser  = 'aahfriyfnq';
    $dbpaswd = 'Q?hqoMeEP#8TFCsg?NCe';
    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpaswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
    return $db;

}

// $conn = mysqli_init();
// mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
// mysqli_real_connect($conn, 'pencloud-server.mysql.database.azure.com', 'aahfriyfnq', 'Q?hqoMeEP#8TFCsg?NCe', 'pencloud', 3306, MYSQLI_CLIENT_SSL);
// if (mysqli_connect_errno($conn)) {
// die('Failed to connect to MySQL: '.mysqli_connect_error());
// }

// $host = 'pencloud-server.mysql.database.azure.com';
// $username = 'aahfriyfnq';
// $password = 'Q?hqoMeEP#8TFCsg?NCe';
// $db_name = 'pencloud';

// //Initializes MySQLi
// $conn = mysqli_init();

// mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// // Establish the connection
// mysqli_real_connect($conn, 'pencloud-server.mysql.database.azure.com', 'aahfriyfnq', 'Q?hqoMeEP#8TFCsg?NCe', 'pencloud', 3306, NULL, MYSQLI_CLIENT_SSL);

// //If connection failed, show the error
// if (mysqli_connect_errno())
// {
//     die('Failed to connect to MySQL: '.mysqli_connect_error());
// }




?>
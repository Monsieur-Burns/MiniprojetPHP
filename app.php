<?php
include 'header.php';
require 'vendor/autoload.php';
// incusion de la classe (fichier contenant le classe)
include 'src/Connection.php';

use src\Connection;

// créer un objet de la classe connection
$connection = new Connection('127.0.0.1', 'root', 'burns', 'cinemal9', 'utf8');

//je modifie l'attribut x ou y
//$connection->login = 'root';
//$connection->password = 'burns';

// je crée un second objet de meme classe
$connectionTwo = new Connection();
$connectionTwo->login = 'root';
$connectionTwo->password = 'burns';
$connectionTwo->charset = 'latin-swedish';
$connectionTwo->timeout = 2;


/**
****** Exercice 1
* Généraliser tous les hosts en localhost
* Créer une 3ème connexion en utf8_general_ci sur le host ovh.mysql.net
* Ajouter un attribut temps de connection avec valeur par défaut à 3
* La seconde connection aura 2 secondes de connection
*/
$connectionThree = new Connection();
$connectionThree->charset = 'utf8_general_ci';
$connectionThree->host = '127.0.0.1';
$connectionThree->login = 'root';
$connectionThree->password = 'burns';



/**
* Créer un tableau de 5 objets
* Afficher pour chaque objet le login et le password
*/

$connectionFour = new Connection();
$connectionFour->login = 'root';
$connectionFour->password = 'burns';

$connectionFive = new Connection();
$connectionFive->login = 'root';
$connectionFive->password = 'burns';

$tab2connection =[
  "Connection 1" => $connection,
  "Connection 2" =>$connectionTwo,
  "Connection 3" =>$connectionThree,
  "Connection 4" =>$connectionFour,
  "Connection 5" =>$connectionFive,
];
?>
<?php
/**
* Dans l'affichage des connexions, si le login est root
* ou admin et qu ele host est localhost, Afficher "La connection est SuperAdmin en local"
*/

/**
* Exercice 2
* Si le temps de connection est inf ou egal à 2
* => Afficher "La connection est courte"
*/



 ?>


<div class="container">
  <div class="row">
    <div class="well">
      <?php
      foreach ($tab2connection as $key => $value) {
        echo('<span class="label label-primary">login is : ' . $value->login . ' and password is : ' . $value->password. '</span><br>');

          if (($value->login == 'root' || $value->login == 'admin') && $value->host == 'localhost') {
          echo '<span class="label label-info">La connection est SuperAdmin en local</span><br>';
          }
          if ($value->timeout <= 2) {
            echo '<span class="label label-warning">La connection est courte !</span><br>';
          }

      echo "<br>";
      }
      ?>
    </div>
  </div>
</div>





/*
* Exercice 3
* Modifier le temps de conection pour chaqsue objet à 5
* Mofifier le 2ème connection pour qu'elle ai le mm logon et pwd que la 1ère con
*/
  foreach ($tab2connection as $key => $value) {
    $value->timeout = 5;
  }

  $tab2connection['Connection 2']->login = $tab2connection['Connection 1']->login ;
  $tab2connection['Connection 2']->password = $tab2connection['Connection 1']->password ;

  var_dump($tab2connection);

















// fonction de débogage pour l'orienté Objet var_dump
// var_dump est l'équivalent de print_r pour le fonctionnel
//var_dump($connection, $connectionTwo, $connectionThree);
//var_dump($tab2connection);

include 'footer.php';
 ?>

<?php
ini_set('display_errors',1);
include 'header.php';
include 'sidebar.php';
require 'vendor/autoload.php';

// incusion de la classe (fichier contenant le classe)
include 'src/Connection.php';
include 'src/Movies.php';
include 'src/Personnel.php';
include 'src/Acteur.php';

use src\Connection;
use src\Personnel;
use src\Acteur;
//use src\Realisateur;
use src\ActeurSerie;
use src\ActeurFilm;
use src\Movies;


// créer un objet de la classe connection
//$connection = new Connection('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');
 // $connection = new Connection('127.0.0.1', 'root', 'burns', 'cinemal9', 'utf8');
$connection = new Connection('monsieurdecinema.mysql.db', 'monsieurdecinema', 'Sherpa1174', 'monsieurdecinema', 'utf8');

?>

<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo('<span class="label label-info">Le login de connection est : ' . $connection->getHost() . ', et le mot de passe est : ' . $connection->getPassword(). ' sur la base de donnée ' .$connection->getDBname().'.</span><br>');
      echo "<br>";
      ?>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $connection->info();
      ?>
    </div>
  </div>
</div>

<?php
/*
* Exercice un deuxième objet de la classe connection et utiliser la methode info()
*/

$objet2 = new Connection('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');
$objet3 = new Connection('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');

//var_dump($objet2->connect());


?>

<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $objet2->info();
      ?>
    </div>
  </div>
</div>


<?php
/*
* Créer une méthde dans la classe connection quipermet d'afficcher dans une alerte bootstrap
* le charset et le nom de la DB de mes connections


* Bonus : Ajouter un param qui permet de régler la couleur de l'alerte
*/
 ?>

<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $objet2->infoDB('info');
      ?>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $objet2->InfoAll();
      ?>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $objet2->infoObjet([$connection, $objet2, $objet3]);
      ?>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
      <?php
        echo $objet2->setColBS(6);
        echo $objet3->setColBSAdvanced(6);
      ?>
  </div>
</div>

<div class="container">
  <div class="row">
      <?php
        echo $objet3->setColBSAdvancedTab([$connection,$objet2, $objet3], 4);
      ?>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="well">
      <?php echo $connection->compare2object($objet2) ?>
    </div>
  </div>

</div>

<?php
/**
 * Créer une classe Movie avec les attributs
 * titre, synopsis, date_release, budget
 * ajouter les getter et setTimeoutcreer une methode qui affiche toutes les info d'un objet Movies
 * creer 4 objets de la classe Movies
 * la construction de l'objet permettra d'initialiser l'année à l'année actuelle
 */




/**
 ********************************* Instanciation des objet
 */



/**
 ****************************** objets Movies
 */

$movieOne = new Movies($connection, 2015, 'Warner Bros');

$movieOne->setTitre('X-Men: Apocalypse');
$movieOne->setSynopsis("Depuis les origines de la civilisation, Apocalypse, le tout premier mutant, a absorbé de nombreux pouvoirs, devenant à la fois immortel et invincible, adoré comme un dieu. Se réveillant après un sommeil de plusieurs milliers d'années et désillusionné par le monde qu'il découvre, il réunit de puissants mutants dont Magneto pour nettoyer l'humanité et régner sur un nouvel ordre. Raven et Professeur X vont joindre leurs forces pour affronter leur plus dangereux ennemi et sauver l'humanité d'une destruction totale.");
//$movieOne->setAnnee(2016);
$movieOne->setDateRelease('2016-05-18');
$movieOne->setBudget('240000000');

//var_dump($movieOne);


$movieTwo = new Movies($connection,2014, 'Europa Corp');

$movieTwo->setTitre('Bienvenue à Marly-Gomont');
$movieTwo->setSynopsis("En 1975, Seyolo Zantoko, médecin fraichement diplômé originaire de Kinshasa, saisit l’opportunité d’un poste de médecin de campagne dans un petit village français. Arrivés à Marly-Gomont, Seyolo et sa famille déchantent. Les habitants ont peur, ils n’ont jamais vu de noirs de leur vie. Mais Seyolo est bien décidé à réussir son pari et va tout mettre en œuvre pour gagner la confiance des villageois... ");
//$movieTwo->setAnnee(2015);
$movieTwo->setDateRelease('2016-06-18');
$movieTwo->setBudget('11000000');



$movieThree = new Movies($connection,2014, '20th Century');

$movieThree->setTitre('The Neon Demon');
$movieThree->setSynopsis("Une jeune fille débarque à Los Angeles. Son rêve est de devenir mannequin. Son ascension fulgurante et sa pureté suscitent jalousies et convoitises. Certaines filles s’inclinent devant elle, d'autres sont prêtes à tout pour lui voler sa beauté. ");
//$movieThree->setAnnee(2015);
$movieThree->setDateRelease('2016-06-08');
$movieThree->setBudget('6500000');




$movieFour = new Movies($connection,2015, 'Sony Pictures');

$movieFour->setTitre('La Nouvelle vie de Paul Sneijder');
$movieFour->setSynopsis("Suite à un rarissime accident, Paul Sneijder ouvre les yeux sur la réalité de sa vie de « cadre supérieur » à Montréal : son travail ne l’intéresse plus, sa femme l’agace et le trompe, ses deux fils le méprisent… Comment continuer à vivre dans ces conditions ? En commençant par changer de métier : promeneur de chiens par exemple ! Ses proches accepteront-ils ce changement qui le transformera en homme libre ? ");
//$movieFour->setAnnee(2014);
$movieFour->setDateRelease('2015-05-24');
$movieFour->setBudget('7500000');



$movieFive = new Movies($connection, 2015, 'Gaumont Distribution');

$movieFive->setTitre('Vicky');
$movieFive->setSynopsis("A presque 30 ans, Victoire la petite dernière de la célèbre famille Bonhomme, l'éternelle enfant sage de la tribu, décide enfin de s'émanciper en découvrant l'alcool, le sexe, et... sa voix. Grâce à Banjo, un chanteur de bar et d'Elvis, elle va réussir à prendre son envol en chantant l'amour avec pudeur et le sexe sans tabou, et entraîne sa mère avec elle au grand dam de son père et de son frère. ");
//$movieFour->setAnnee(2014);
$movieFive->setDateRelease('2018-06-14');
$movieFive->setBudget(8500000);


//var_dump($movieOne, $movieTwo, $movieThree, $movieFour);

$acteurOne = new Acteur($connection);
$acteurOne->setPrenom('Jean');
$acteurOne->setNom('Reno');
$acteurOne->setDob('1948-07-30');
$acteurOne->setImage('http://fr.web.img1.acsta.net/cx_160_213/b_1_d6d6d6/pictures/15/12/08/15/41/448666.jpg');
$acteurOne->setRecompense('Cesar Meilleur Acteur 1995');
$acteurOne->setFilmJoue(['Leon','Da Vinci Code','Antigang','Blindés', 'Le Premier Cercle']);
$acteurOne->setBiographie("Juan Moreno y Herrera-Jiménez naît à Casablanca, au Maroc alors sous protectorat français, de parents espagnols, originaires d'Andalousie (son père était de Sanlúcar de Barrameda et sa mère était de Jerez de la Frontera) qui ont fui le régime de Franco. La famille s'installe ensuite en France métropolitaine en 1970. Naturalisé français, il continue par la suite de se sentir avant tout comme espagnol car « [ses] racines sont avant tout espagnoles, andalouses »2. Il décide de se lancer dans une carrière de comédien, et une fois revenu de son service militaire en Allemagne, monte une compagnie théâtrale avec Didier Flamand.

Jean Reno fait ses premières apparitions dans des films tels que Clair de femme de Costa-Gavras (1979) ou Le Dernier Combat de Luc Besson (1983) qu'il rencontre sur le tournage des Bidasses aux grandes manœuvres. Et c'est avec ce réalisateur qu'il se fait remarquer en 1985 dans son film Subway, dans lequel il joue aux côtés d'Isabelle Adjani, de Christophe Lambert, de Michel Galabru ou encore de Richard Bohringer.
Le succès à 40 ans
Jean Reno en 2010, à l'avant-première du film L'Immortel.

Mais c'est en 1988 avec le film Le Grand Bleu que l'acteur connaît véritablement le succès, à quarante ans. Devenu un acteur familier du public français, il retrouve Luc Besson pour Nikita où il fait une apparition dans le rôle d'un tueur, le « nettoyeur » Victor. Il confirme son accession au vedettariat avec L'Opération Corned-Beef, de Jean-Marie Poiré, dont il partage l'affiche avec Christian Clavier. Sa collaboration suivante avec le tandem Poiré-Clavier, Les Visiteurs, remporte en 1993 un immense succès au box-office français. L'année suivante, il est à nouveau dirigé par Luc Besson dans Léon, un film où il interprète le rôle d'un tueur naïf en partie inspiré de son personnage dans Nikita. Tourné en anglais aux États-Unis, Léon, qui révèle également la jeune Natalie Portman, confère à Jean Reno une notoriété internationale. Multipliant les registres, s'étant affirmé comme l'une des valeurs sûres du cinéma français, il est désormais sollicité par Hollywood et apparaît dans divers blockbusters américains comme Mission impossible, Godzilla, Ronin, La Panthère rose ou encore Da Vinci Code.

Reno a été nommé trois fois pour le César du meilleur acteur : deux fois pour un premier rôle grâce à Léon et Les Visiteurs, ainsi qu'une fois pour un second rôle dans Le Grand Bleu.

Il est également connu au Japon, depuis le succès qu'y a remporté le Grand Bleu, et a notamment tourné dans des publicités de Honda Orthia (1996)3,4 et dans Wasabi en 2001 avec Ryōko Hirosue.

Jean Reno a par ailleurs refusé le rôle de l'agent Smith dans le film Matrix (qui sera finalement joué par Hugo Weaving), choisissant plutôt de jouer dans Godzilla5. Il refuse ensuite un rôle dans Matrix Reloaded et Matrix Revolutions préférant rester en France avec sa famille6.");





var_dump($acteurOne);


/**
 *************** Instanciation Objet Acteur
 */

?>




<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $movieOne->InfoMovies();
      ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $movieTwo->InfoMovies();
      ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $movieThree->InfoMovies();
      ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="well">
      <?php
        echo $movieFour->InfoMovies();
      ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="well">
      <h3>Comparaison de budget</h3>
      <?php echo $movieOne->compareMoviesBudget($movieTwo) ?>
    </div>
  </div>
</div>


  <div class="container">
    <div class="row">
      <div class="well">
        <h3>Nombres de mots du synopsis</h3>
        <?php echo $movieOne->countWordsSynopsis() ?>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="well">
        <h3>Warner Bros et Visible ?</h3>
        <?php if ($movieOne->checkDistrVisible() == true) {
              echo 'Oui le film est visible et distribué par Warner Bros';
              }else {
                echo "Non le film n'est pas distribué par Warner Bros et n'es pas visible";
              }
          ?>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="well">
        <button class='btn btn-primary' type='button'>Nombre de film à gros budget <span class='badge'><strong><?php echo $movieOne->getNbFilmGrosBudget([$movieOne, $movieTwo, $movieThree, $movieFour]);?></strong></span></button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="well">
        <button class='btn btn-primary' type='button'>Moyenne des film a petit budget <span class='badge'><strong><?php echo $movieOne->getMoyFilmPetitBudget([$movieOne, $movieTwo, $movieThree, $movieFour]);?></strong></span></button>
      </div>
    </div>
  </div>

<?php
$movieOne->insertMovieInDB();

/***********************************
* Créer une méthode qui me retourne les 3 derniers films français visibles
  avec pour paramètre le nom du distributeur et la bo


* Ajouter l'attribut id dans ma classe Movie. Cet id sera initialiser lors de la construction de mon objet
* Créer une méthode qui permettra d'insérer un commentaire à partir d'un parametre objet Movie
* Créer une méthode qui me retourne les 3 derniers films français visibles
* avec pour paramètre le nom du distributeur et la bo
*
*/

$lastFrMovie = $movieOne->getLastThreeFrMovies('VOSTFR', 'Warner Bros');
//var_dump($movieOne->getLastThreeFrMovies()); ?>

<div class="container">
  <div class="row">
      <?php foreach ($lastFrMovie as $key => $value) {?>
        <div class="jumbotron">
        <?php
        echo '<h3>'. $value['title'] . '</h3>';
        echo '<p>' . $value['synopsis'] . '</p><br>';
        echo '<span class="label label-primary">' . $value['annee'] . '</span>';
        echo '<span class="label label-primary">' . $value['date_release'] . '</span></div>';
      }
       ?>
    </div>
  </div>
</div>


<?php
$movieOne->injectTab2film([$movieTwo,$movieThree,$movieFour]);
$movieOne->existMoviesInDb();
//echo $movieOne->deleteMovieFromID(63);

echo $movieFive->updateMoviesFromID(63, $movieFive);

//echo $movieFive->findMovieFromTitle('Vicky');

  if ($movieFive->findMovieFromTitle('Vicky')== false) {
    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>Ce film existe pas en base de donnée</div>';
  } else {
    echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>Ce film est présent en base de donnée</div>';
  }



//echo $movieFive->countMoviesBetweenValue(100000, 100000000);
//var_dump($movieFive,$movieFour);

?>

  <div class="container">
    <div class="row">
      <div class="well">
        <button class='btn btn-primary' type='button'>Le film est sorti <span class='badge'><strong><?php echo $movieFive->testDateReleaseFromMovie($movieFour);?></strong></span> la date courante </button>
      </div>
    </div>
  </div>

<?php
  $catFilm = $movieOne->getCatInfoFromID(62);
  //var_dump($catFilm);
 ?>



  <div class="container">
    <div class="row">
          <div class="jumbotron">
          <?php
          echo '<p>Nom de la catégorie : <strong>'. $catFilm['cattitle'] . '</strong>, <small>description : '. $catFilm['catdesc'] .'</small></p>';
          ?>
      </div>
    </div>
  </div>

<!-- ******************************************** Acteurs -->
<?php


/*    SET IMAGE ACTEUR      */
//$acteurOne->setImageActeurs('http://toto');


$acteurOne->checkImageProvier();
 ?>





<?php
//var_dump($movieFour->getCatInfoFromID(62));
 ?>


















<?php
include 'footer.php';
 ?>

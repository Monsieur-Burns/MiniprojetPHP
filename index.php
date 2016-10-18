<?php include "header.php";
require 'vendor/autoload.php';
 include 'sidebar.php';?>



<?php
$lastMovies = getSixBestMovies($linkDB);
$lastComments = getSixLastComments($linkDB);
$nextMovieVo = getThreeNextVO($linkDB);
$lastUserConnection = getFiveLastUserCo($linkDB);
$lastIframe = getThreLastIframe($linkDB);
$bestCat = getFourBestCat($linkDB);
$bestActor = getThreeBestAct($linkDB);
$bestRealisateur = getSixBestReal($linkDB);
?>


  <div class="container ">
    <h1>DATABASE CINEMA</h1>

<!-- Moteur de recherche Film -->
<?php $searchForm = $_POST ?>

<!-- ***************** section recherche ***************** -->

<div class="container menuRecherche">
  <div class="row rechercheFilm">
    <form class="form-horizontal" action="resultMovies.php" method="post">
      <div class="col-md-10 col-md-offset-1">
        <div class="form-group">
          <div class="input-group champR">
            <span class="input-group-addon recherche">Film</span>
            <input class="form-control recherche" type="text" name="searchKeyWords" placeholder="Recherchez votre film">
            <span class="input-group-btn">
              <button class="btn btn-default recherche" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
          </div>
        </div>
      </div>
    </form>
  </div>
<!-- Moteur de recherche Cinema -->
  <div class="row rechercheCinema">
    <form class="form-horizontal" action="resultCinema.php" method="post">
      <div class="col-md-10 col-md-offset-1">
        <div class="form-group">

          <div class="input-group">
            <span class="input-group-addon recherche">Cinema</span>
            <input class="form-control recherche" type="text" name="searchKeyWordsCine" placeholder="Recherchez votre cinéma">
            <span class="input-group-btn ">
              <button class="btn btn-default recherche" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- ****************** section collapse ***************** -->
<div class="container collap">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Les six films les mieux notés et les six serniers commentaires
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">

          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Les six films les mieux notés</h3></div>
              <?php foreach ($lastMovies as $key => $value) { ?>
              <div class="panel-body"><?php echo $value['title']; ?></div>
              <?php } ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Les six derniers commentaire</h3></div>
              <?php foreach ($lastComments as $key => $value) { ?>
              <div class="panel-body"><?php echo $value['content'] . ' publié le ' .$value['created_at'] ; ?>  <span class="label label-default pull-right"><?php echo $value['note']; ?></span></div>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Les trois prochains films disponible en version originale
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">

            <div class="panel panel-default">
              <!-- <div class="panel-heading"><h2 class="panel-title">Mes tois prochains film en VO</h2></div> -->
                <div class="row">
                  <div class="panel-body">
                    <?php foreach ($nextMovieVo as $key => $value) { ?>
                      <div class="col-md-4" id="sixmovies">
                        <a href="movie.php?id=<?php echo $value['id'] ?>"><h4><strong><?php echo $value['title']; ?></strong></h4></a><a href="categorie.php?id=<?php echo $value['categories_id'] ?>"><span class="label label-success"><?php echo $value['category']; ?></span></a>
                        <p><small>Date de sortie : le <?php echo $value['date_release']; ?> - Durée : <?php echo $value['duree']; ?>h00</small></p>
                        <p><img src="<?php echo $value['image']; ?>" /><?php echo $value['synopsis']; ?></p>
                      </div>
                      <?php } ?>
                  </div>
                </div><!--end row -->
            </div><!--end panel -->

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Les connectés de la semaine
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="row">
                  <div class="panel-body" id="flexalign">
                    <?php foreach ($lastUserConnection as $key => $value) { ?>
                      <div class="col-md-2">
                        <h4><strong><?php echo $value['username']; ?></strong></h4>
                        <p id="ville"><?php echo $value['ville']?></p>
                        <p><?php echo $value['tel']; ?></p>
                        <p><?php echo $value['email']; ?></p>
                        <img src="<?php echo $value['avatar'] ?>" alt="" />
                        <p><small>Connecté le : <br><?php echo $value['lastActivity']; ?></small></p>
                      </div>
                      <?php } ?>
                  </div>
                </div><!--end row -->
            </div><!--end panel -->

        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Les 3 dernières vidéos publiées
          </a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">

          <div class="panel panel-default">
            <!-- <div class="panel-heading"><h2 class="panel-title">Les 3 dernières vidéos publiées</h2></div> -->
              <div class="row">
                <div class="panel-body" id="flexalign">
                  <?php foreach ($lastIframe as $key => $value) { ?>
                    <div class="col-md-4">
                      <h4><strong><?php echo $value['title']; ?></strong></h4>
                      <?php echo $value['video'] ?>
                    </div>
                    <?php } ?>
                </div>
              </div><!--end row -->
          </div><!--end panel -->

        </div>
      </div>
    </div>


  </div>
</div>





  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading"><h2 class="panel-title">Les 4 catégories qui ont le plus de films</h2></div>
          <div class="row">
            <div class="panel-body" id="flexalign">
              <?php foreach ($bestCat as $key => $value) { ?>
                <div class="col-md-4">
                  <span class="label label-success"><?php echo $value['title']; ?></span>
                  <span class="label label-info"><?php echo $value['count']; ?></span>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading"><h2 class="panel-title">Les 3 meilleurs acteurs</h2></div>
          <div class="row">
            <div class="panel-body" id="flexalign">
              <?php foreach ($bestActor as $key => $value) { ?>
                <div class="col-md-4">
                  <a href="acteur.php?id=<?php echo $value['id'] ?>"><span class="label label-danger"><?php echo $value['nomcomplet']; ?></span></a>
                  <span class="label label-info"><?php echo $value['nbrfilm']; ?></span>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->


  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panel-title">Les 6 meilleurs réalisateurs</h2></div>
          <div class="row">
            <div class="panel-body" id="flexalign">
              <?php foreach ($bestRealisateur as $key => $value) { ?>
                <div class="col-md-4">
                  <a href="realisateur.php?id=<?php echo $value['id'] ?>"><span class="label label-danger"><?php echo $value['nomcompletReal']; ?></span></a>
                  <span class="label label-info"><?php echo $value['nbrfilmReal']; ?></span>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

  <!-- <div class="container">
    <?php // include 'appProtected.php'; ?>
  </div> -->














<?php  ?>


</div><!--end container-->

<?php include "footer.php" ?>

<?php include "header.php"; ?>
<div class="container">
  <h1> Resultat Recherche de films</h1>
  <hr>
<?php include "sidebar.php"; ?>



<!-- $_POST : récupère les donnée de mon formulaire (tableau associatif de mes donnée de formulaire) -->
    <?php $searchForm = $_POST;
    $search = searchMovieByKW($searchForm['searchKeyWords'],$linkDB); ?>

    <!--<?php //echo "<pre>";
    //print_r($searchForm);
    //print_r($search);
    //echo "</pre>"; ?> -->

    <div class="row">
      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body" id="panelSearchMovies">
            <?php foreach ($search as $key => $value) { ?>
              <div class="row">
                <div class="col-md-9">
                  <h3><?php echo $value['title']; ?></h3>
                  <p><small><?php echo 'Durée : ' . $value['duree'].'h00, distribué par : '. $value['distributeur'] . ', et sorti en ' . $value['annee']; ?></small></p>
                  <p><em><?php echo $value['synopsis'] ?></em></p>
              </div>
              <div class="col-md-3">
                  <img src=<?php echo $value['image'] ?> />
              </div>
                <hr>
              </div>
            <?php } ?> <!--endForEach-->
          </div>






          </div><!--endPanelBody-->
        </div><!--endPanelDefault-->
      </div><!--endCol-->
    </div> <!--endRow-->
















</div> <!--endContainer-->
<?php include "footer.php"; ?>

<?php include "header.php";?>

<div class="container">
  <h1><i class="fa fa-film" aria-hidden="true"></i> Page Réalisateurs</h1>
  <hr>
  <?php include "sidebar.php" ?>
<!-- // $_GET est un tableau associatif déjà existant en php
      // ui permet dfe récupérer les variables transmises en URL -->
    <?php $id = $_GET['id'];
    $realisateur = getRealDetailById($id,$linkDB);
    $moviesrealisateur = getMoviesFromRealById($id,$linkDB);

    ?>
    <div class="row">
      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <h2><?php echo $realisateur['firstname'] .' '. $realisateur['lastname']; ?></h2>
            <span class="label label-primary"><?php echo $realisateur['dob']; ?></span>
            <hr>
            <div class="row">
              <div class="col-md-9">
                <p><?php echo $realisateur['biography']; ?></p>
                  <?php foreach ($moviesrealisateur as $key => $value) { ?>
                    <a href="movie.php?id=<?php echo $value['id'] ?>"><span class="label label-info"><?php echo $value['titre'] ?></span></a>
                  <?php } ?> <!--endForEach-->
              </div>
              <div class="col-md-3 imgFilm">
                <img src="<?php echo $realisateur['image']; ?>" />
              </div>
            </div>
          </div><!--endPanelBody-->
        </div><!--endPanelDefault-->
      </div><!--endCol-->
    </div> <!--endRow-->




  <?php include "footer.php" ?>
</div> <!--endContainer-->



<?php  ?>

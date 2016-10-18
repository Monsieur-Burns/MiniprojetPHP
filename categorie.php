<?php include "header.php";?>

<div class="container">
  <h1><i class="fa fa-film" aria-hidden="true"></i> Page Categories</h1>
  <hr>
  <?php include "sidebar.php" ?>
<!-- // $_GET est un tableau associatif déjà existant en php
      // ui permet dfe récupérer les variables transmises en URL -->
    <?php $id = $_GET['id'];
    $categorie = getCategorieDetailById($id,$linkDB);
    $movies = getMoviesFromCatById($id,$linkDB);
    ?>
    <div class="row">
      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <h2><?php echo $categorie['title']; ?></h2>
            <hr>
            <div class="row">
              <div class="col-md-9">
                <p><?php echo $categorie['description']; ?></p>
                <ul>
                  <?php foreach ($movies as $key => $value) { ?>
                    <a href="movie.php?id=<?php echo $value['id'] ?>"><li><?php echo $value['title'] ?></li></a>

                    <?php } ?> <!--endForEach-->
                </ul>
              </div>
              <div class="col-md-3 imgFilm">
                <img src="<?php echo $categorie['image']; ?>" />
              </div>
            </div>





          </div><!--endPanelBody-->
        </div><!--endPanelDefault-->
      </div><!--endCol-->
    </div> <!--endRow-->




  <?php include "footer.php" ?>
</div> <!--endContainer-->



<?php  ?>

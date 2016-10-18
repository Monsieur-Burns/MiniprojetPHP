<?php include "header.php";?>

<div class="container">
  <h1><i class="fa fa-film" aria-hidden="true"></i> Page Movies</h1>
  <hr>
  <?php include "sidebar.php";
  require 'vendor/autoload.php';

   ?>
<!-- // $_GET est un tableau associatif déjà existant en php
      // ui permet dfe récupérer les variables transmises en URL -->
    <?php $id = $_GET['id'];
    $film = getMoviesDetailById($id,$linkDB);
    $commentaires = getCommentDetailById($id,$linkDB);
    $media = getMediaDetailById($id,$linkDB);
    $filmFromCat = getMoviesDetailByCategories($film['catid'],$id, $linkDB);
    ?>
<!-- $_POST : récupère les donnée de mon formulaire (tableau associatif de mes donnée de formulaire) -->
    <?php $dataForm = $_POST ?>


<!-- insertion du commentaire en DB -->
    <?php
      // si mes donnée ne sont pas vide - -isset verifie si la clé 'notefilm' est présente
      if (!empty($dataForm)&& isset($_POST['notefilm'])) {
        // insertion du commentaire en DB
        insertCommentInMovie($id,$linkDB);
        echo '<div class="alert alert-success">Le commentaire a été ajouté</div>';
      }
      if (!empty($dataForm) && isset($_POST['imageMedia'])) {
        // insertion du media en DB
        insertMediaInMovie($id,$linkDB);
        echo '<div class="alert alert-success">Le media a été ajouté</div>';
      }

     ?>






<!--****************** affichage fiche film  -->
    <div class="row">
      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <h2><?php echo $film['title']; ?></h2>
            <hr>
            <div id="labelFilm">
              <span class="label label-info"><?php echo $film['type']; ?></span>
              <span class="label label-info"><?php echo $film['bo']; ?></span>
              <span class="label label-info"><?php echo $film['date_release']; ?></span>
              <span class="label label-info"><?php echo $film['duree'] . 'h00'; ?></span>
              <span class="label label-info"><?php echo $film['distributeur']; ?></span>
              <span class="label label-info"><?php echo $film['note_presse']; ?></span>
              <span class="label label-danger"><?php echo $film['cattitle']; ?></span>

            </div>
            <hr>
<!-- *************** Affiche les commentaires du film  -->
            <div class="row">
              <div class="col-md-9">
                <p><?php echo $film['synopsis']; ?></p>
                <hr>
                <div class="row">
                  <div class="panel-body" >
                    <h3>Commentaires du film</h3>
                    <?php foreach ($commentaires as $key => $value) { ?>
                      <div class="">
                        <span class="label label-danger"><?php echo $value['content']; ?></span>
                        <span class="label label-info"><?php echo StarReplace((int) $value['note']); ?></span><br>
                      </div>
                      <?php } ?>
                  </div>
                </div><!--end row -->
              </div>
              <div class="col-md-3 imgFilm">
                <img src="<?php echo $film['image']; ?>" />
              </div>
            </div> <!--endRow-->


<!-- Ajouter un Formulaire avec methode POST -->
            <div class="row">
              <div class="col-md-12">
                <h3>Ajouter un commentaire</h3>
                <form action="movie.php?id=<?php echo $id; ?>" method="post">

                  <label for="note">Note</label>
                  <input name="notefilm" type="text" required="required" id="note" class="form-control">

                  <br>

                  <label for="contenu" >Contenu</label>
                  <textarea name="contenuComment" required="required" id="contenu" class="form-control" ></textarea>

                  <br>

                  <button class="btn btn-info" type="submit">Ajouter le commentaire</button>

                </form>
              </div>
            </div> <!--endRow-->



<!--******************** Afficher les media du film   -->
            <hr>
            <div class="row" id="mediaFilm">
              <div class="panel-body" >
                <h3>Media du film</h3>
                <?php foreach ($media as $key => $value) { ?>
                  <?php if ($value['nature']==1){ ?>
                    <div class="col-md-4">
                      <img src="<?php echo $value['picture']; ?>" />
                    </div>
                  <?php }else {  ?>
                    <div class="col-md-6">
                      <?php echo $value['video']; ?>
                    </div>
                  <?php } ?><!--endElse-->

                  <?php } ?> <!--endForeach-->
              </div>
            </div><!--end row -->

<!--******************** Ajouter un media en database  -->
            <div class="row">
              <div class="col-md-12">
                <h3>Ajouter un média en DB </h3>
                <form action="movie.php?id=<?php echo $id; ?>" method="post">

                  <label for="selNature"></label>
                  <select class="form-control" name="natureMedia" id="selNature">
                    <option value="1">Image</option>
                    <option value="2">Video</option>
                  </select>

                  <label for="imgMedia">URL de l'image</label>
                  <input name="imageMedia" type="text" id="imgMedia" class="form-control">

                  <br>

                  <label for="vidMedia" >URL de la video</label>
                  <textarea name="videoMedia" id="vidMedia" class="form-control" ></textarea>

                  <br>

                  <button class="btn btn-info" type="submit">Ajouter le commentaire</button>

                </form>
              </div>
            </div> <!--endRow-->


<!-- Appeler les films de la categorie du film courant -->

        <div class="row">
          <div class="col-md-12">
            <h3>Les films de la catégorie</h3>
            <?php
              foreach ($filmFromCat as $key => $value) { ?>
              <p><?php echo $value['title']; ?></p>
              <?php }?>
          </div>

        </div>








          </div><!--endPanelBody-->
        </div><!--endPanelDefault-->
      </div><!--endCol-->
    </div> <!--endRow-->




  <?php include "footer.php" ?>
</div> <!--endContainer-->

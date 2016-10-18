<?php include "header.php"; ?>
<div class="container">
  <h1> CONTACT</h1>
  <hr>
<?php include "sidebar.php"; ?>



<!-- $_POST : récupère les donnée de mon formulaire (tableau associatif de mes donnée de formulaire) -->
    <?php $contactForm = $_POST ?>
    
    <?php echo "<pre>";
    print_r($contactForm);
    echo "</pre>"; ?>

<!-- insertion du commentaire en DB -->
    <?php
      // si mes donnée ne sont pas vide - -isset verifie si la clé 'notefilm' est présente
      if (!empty($contactForm)&& isset($_POST['sujetComm'])) {
        if(preg_match("/^[a-z]{3,}$/i", $contactForm['sujetComm']) && preg_match("/^[a-z0-9 \,\.\-]{10,}$/i", $contactForm['contenuComm']) && preg_match("/.+@.+\..+/i", $contactForm['mailComm']) && preg_match("/^http[s]?:\/\/.+[.].+[.].+/i", $contactForm['urlComm']) ){
          insertContact($linkDB);
          echo '<div class="alert alert-success">Le commentaire a été ajouté</div>';
        }else {
          echo '<div class="alert alert-danger">Vérifiez les données saisies</div>';
        }
      }//endIf lvl1

     ?>








<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4>Contactez-Nous</h4>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="contactQ.php" method="post">
          <div class="form-group">
            <label for="select" class="control-label">Sujet</label>
              <select name="sujetComm" class="form-control" id="select">
                <option value="sujetUn">Sujet 1</option>
                <option value="sujetDeux">Sujet 2</option>
                <option value="sujetTrois">Sujet 3</option>
                <option value="SujetQuatre">Sujet 4</option>
              </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="url">URL du site</label>
            <input class="form-control" type="url" name="urlComm" type="text" placeholder="URL du site" required="required" id="url" />
          </div>
          <div class="form-group">
            <label class="control-label" for="mail">Email</label>
            <input class="form-control" type='email' name="mailComm" type="text" placeholder="Votre email" required="required" id="mail" />
          </div>
          <div class="form-group">
            <label class="control-label" for="contenu">Contenu</label>
            <textarea class="form-control" name="contenuComm" placeholder="Expliquez-nous ..." required="required" id ="contenu"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-warning">Ajouter un commentaire</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> <!-- fin de row 2-->





















</div> <!--endContainer-->
<?php include "footer.php"; ?>



<form class="form-horizontal" action="<?php echo $variables['src']; ?>" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Nom:</label>
      <div class="col-sm-10">
        <input name="name" type="text" class="form-control" id="name" placeholder="Entrez votre nom">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Prénom:</label>
      <div class="col-sm-10">
        <input name="Prénom" type="text" class="form-control" id="Prénom" placeholder="Entrez votre prénom">
      </div>
    </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input name="email" type="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail">
        </div>
      </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Mot de passe:</label>
    <div class="col-sm-10">
      <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Entre votre mot de passe">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Envoyer</button>
    </div>
  </div>
</form>

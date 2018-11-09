<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<label class="btn" for="modal-one">Example</label>

<!-- Modal One -->
<div class="modal">
  <input class="modal-open" id="modal-one" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="modal-one"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Se connecter</h2>
        <label class="btn-close" for="modal-one" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
      <form method="POST">
          <label for="email">Mail</label> <br>
            <input type="mail" name="email" autofocus> <br>
    
            <label for="password">Mot de passe</label> <br>
            <input type="password" name="password" autofocus> <br>
          </div>
          <div class="modal-footer">
          <button type="submit" for="modal-one">Valider</button>
            <label class="btn btn-primary" for="modal-one">Fermer</label>
      </form>
      </div>
    </div>
  </div>
</div>


<div class="test-rond"><img class="test-image" src="images/responsive_web_site.png" alt=""></div>
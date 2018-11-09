<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="style-contact.css">
    <link rel="stylesheet" href="style-modal.css">
    <link rel="stylesheet" href="style-article.css">
    <title>Vu-du.net</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php"><img src="images/logo.png" alt="logo"></a>
            <ul class="nav-link">
                <li><a href="index.php#produit">Notre produit</a></a></li>
                <li><a href="index.php#about">A propos</a></li>
                <li><a href="index.php#service">Nos services</a></li>
                <li><a href="index.php#news">Actus</a></li>
                <li><a href="contact.php">Prise de contact</a></li>
                <li><label class="btn" for="modal-one">Mon compte</label></li>
                
            </ul>
        </nav>
    </header>

 <!-- <div class="modal-bg"></div>

        <div class="modal-content">
        
            <form method="post">
                <label for="email">Mail</label> <br>
                <input type="mail" name="email" autofocus> <br>

                <label for="password">Mot de passe</label> <br>
                <input type="password" name="password" autofocus> <br>

                <button type="submit" class="btn-modal">Valider</button>
                <span class="modal-close">X</span>
                <span class="btn-modal">Fermer</span>
            </form>
    </div> -->
    

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
            <input class="form-connect" type="mail" name="email" autofocus> <br>
    
            <label for="password">Mot de passe</label> <br>
            <input class="form-connect" type="password" name="password"> <br>
          </div>
          <div class="modal-footer">
          <button class="btn-primary" type="submit" for="modal-one">Valider</button>
        <button class="btn-primary" for="modal-one">Fermer</button>
      </form>

      </div>
    </div>
  </div>
</div>
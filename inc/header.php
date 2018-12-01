<?php
if(session_status()== PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="../style-index.css">
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/regular.css" integrity="sha384-z3ccjLyn+akM2DtvRQCXJwvT5bGZsspS4uptQKNXNg778nyzvdMqiGcqHVGiAUyY" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
    <title>Vu-du.net</title>
</head>


<body>
    <header class="header">
        <nav>
            <div class="circle"></div>

            <div class="menu">

                <a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a>

                <ul class="nav-link">
    
                    
                    <?php if (isset($_SESSION['auth'])): ?>
                    
                    <li><a href="index.php#produit">Notre produit</a></li>
                    <li><a href="index.php#about">A propos</a></li>
                    <li><a href="index.php#service">Nos services</a></li>
                    <li><a href="index.php#news">Actus</a></li>
                    <li><a href="contact.php">Prise de contact</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="#">Mon compte</a>
                            <div class="dropdown-content">
                                
                            <a href="website">Mon site</a>
                            <a href="logout">Se déconnecter</a>
    
                            </div>
                            
                        </div>
                    </li>
    
                    <?php else: ?>
    
                    <li><a href="index.php#produit">Notre produit</a></a></li>
                    <li><a href="index.php#about">A propos</a></li>
                    <li><a href="index.php#service">Nos services</a></li>
                    <li><a href="index.php#news">Actus</a></li>
                    <li><a href="contact.php">Prise de contact</a></li>
                    <li><label class="btn" for="modal-one">Mon compte</label></li>
                    
                    <?php endif; ?>
                    
                </ul>
            </div>
            <div class="burger">
				<div class="x"></div>
				<div class="y"></div>
                <div class="z"></div>
            </div>
        </nav>
    </header>

<div class="container">

<?php if(isset($_SESSION['flash'])): ?>
    <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>


<?php 


if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    $req = $pdo->prepare('SELECT * FROM members WHERE email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user) {
        if(password_verify($_POST['password'], $user->password)) {
          $_SESSION['auth'] = $user;
          $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
          
          if($_POST['remember']) {
            $remember_token = str_random(250);
            $pdo->prepare('UPDATE members SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
            setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'krys'), time() + 60 * 60 * 24 * 7);
            }
            
    } else {
        header('Location: index.php');
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte'; //mdp erroné
    }
    
    reconnect_from_cookie();
    if($user->role_id == 1) {
        header('Location: admin.php');
    }
    elseif(isset($_SESSION['auth'])){
        header('Location: account.php');
        exit();
    }
    
  } else {
        header('Location: index.php');
      $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrecte"; //mail erroné
    }
} 

?>


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
            
            <label>
            <input type="checkbox" name="remember" value="1">Se souvenir de moi
            </label>
            
            <p><a href="forget.php" for="modal-one">Mot de passe oublié ?</a></p>
            <p>Vous n'avez pas de compte ? <a href="register.php">Enregistrez-vous</a></p>
          </div>
          <div class="modal-footer">
          
          <button type="submit" class="btn-primary" for="modal-one">Valider</button>
      </form>
        
      </div>
    </div>
  </div>
</div>
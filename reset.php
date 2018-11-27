<?php 

if(isset($_GET['id']) && isset($_GET['token'])) {
    require 'inc/db.php';
    require 'inc/functions.php';
    $req = $pdo->prepare('SELECT * FROM members WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if($user) {
        if(!empty($_POST)) {
            if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE members SET password = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
                session_start();
                $_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié';
                header('Location: index.php');
                exit();
            }
        }
    }else {
        session_start();
        $_SESSION['flash']['danger'] = "Une erreur est survenue veuillez réessayer";
        header('Location: index.php');
        exit();
    }
}
else {
    header('Location:index.php');
    exit();
}
?>

<?php require 'inc/header.php'; ?>

<h1>Réinitialiser votre mot de passe</h1>
        
    <form action="" method="POST" class="form-col-1">
    
        <div class="col-1">
            <label for="">Nouveau mot de passe</label>
            <input type="password" name="password" placeholder="Nouveau mot de passe">
        </div>
         
        <div class="col-1">
            <label for="">Confirmation</label>
            <input type="password" name="password_confirm" placeholder="Confirmation du mot de passe">
        </div>

            <button type="submit" class="btn-primary">Réinitialiser</button>
    </form>
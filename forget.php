<?php 
if(!empty($_POST) && !empty($_POST['email'])) {
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    $req = $pdo->prepare('SELECT * FROM members WHERE email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user) {
        session_start();
        $reset_token = str_random(60);
        $pdo->prepare('UPDATE members SET reset_token =?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
        $_SESSION['flash']['success'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
        mail($_POST['email'], 'Réinitialisation de votre mot de passe', "Afin de rinitialiser votre mot de passe merci de cliquer sur ce lien\n\nlocalhost/vu-du.net/reset.php?id={$user->id}&token=$reset_token");
        header('Location: index.php');
        exit();
    }

    else {
        $_SESSION['flash']['danger'] = 'Aucun compte ne correspond à cette adresse';
    }
}

?>

<?php require 'inc/header.php'; ?>

<h1>Mot de passe oublié</h1>

    <form action="" method="POST" class="forget-form">
        <div>
            <label for="">Mail</label>
            <input type="email" name="email" >
        </div>
    <button type="submit">Envoyer</button>     
    </form>
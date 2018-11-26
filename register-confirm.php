<?php 

$user_id = $_GET['id'];

$token = $_GET['token'];

require 'inc/db.php';


$req = $pdo->prepare('SELECT * FROM members WHERE id = ?');

$req->execute([$user_id]);

$user = $req->fetch();

if($user && $user->confirmation_token == $token) {

    session_start();
    $pdo->prepare('UPDATE members SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
    $_SESSION['auth'] = $user;

    $_SESSION['flash']['success'] = 'Compte créé avec succés !';
    header('Location: account.php');

}

else {
    $_SESSION['flash']['danger'] = "Veuillez vous reconnecter ou vous réinscrire";
    header('Location: login.php');
}
?>


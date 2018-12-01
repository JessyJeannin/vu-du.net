<?php session_start(); ?>
<?php require 'inc/functions.php'; ?>

<?php

if (!empty($_POST)) {

$errors = array();
require_once 'inc/db.php';

if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Veuillez entrer votre email";
}

else {
    $req = $pdo->prepare('SELECT email FROM members WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user =$req->fetch();
    if($user) {
        $errors['email'] = 'Cet email est déjà utilisé';
    }
}

if(strlen($_POST['password']) < 6) {
    $errors['password'] = "Mot de passe invalide, un minimum de 6 caractères est requis";
}

if(empty($_POST['password'])) {
    $errors['password'] = "Veuillez entrer votre mot de passe";
}

if(($_POST['password']) != $_POST['password_confirm']) {
    $errors['password'] = "Les deux mot de passe sont différents";
}

if(empty($errors)) {

    $req = $pdo->prepare("INSERT INTO members SET email = ?, phone = ?, password = ?, confirmation_token = ?, role_id = ?");
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $token = str_random(60);

    $req->execute([$_POST['email'], $_POST['phone'], $password, $token, $_POST['role_id']]);

    $user_id = $pdo->lastInsertId();

    header('Location: register-confirm.php?id=' . $user_id . '&token=' .$token); //permet de rediriger vers confirm.php avec l'id et le token en GET

    exit();

    }
}

?>

<?php require 'inc/header.php'; ?>

<h1 class="title">Nouvel utilisateur</h1>

<?php if(!empty($errors)): ?>

<div class="alert alert-danger">

    <ul>

    <?php foreach($errors as $error): ?>

        <li><?= $error; ?></li>

    <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

<form action="" method="POST" class="form-col-1">

<div class="col-1">
    <label for="email">Email</label> <br>
    <input type="email" name="email" placeholder="exemple@exemple.com"> <br>
    
    <label for="phone">Numéro de téléphone</label> <br>
    <input type="tel" pattern="[0-0]{1}[0-9]{9}" placeholder="0123456789" name="phone"> <br>
    
    <label for="password">Mot de passe</label> <br>
    <input type="password" name="password"> <br>
    
    <label for="password_confirm">Confirmez votre mot de passe</label> <br>
    <input type="password" name="password_confirm"> <br>
    
    <label for="role_id"></label>
    <input type="radio" name="role_id" value="2" checked style="visibility:hidden">
</div>

<button type="submit" class="btn-primary">Valider</button>

</form>
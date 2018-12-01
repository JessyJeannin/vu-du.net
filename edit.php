<?php session_start(); ?>
<?php
require_once 'inc/db.php';

$reqNews = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$reqNews->execute([$_GET['id']]);
$resNews = $reqNews->fetch(PDO::FETCH_OBJ);

if (!empty($_POST)) {

$errors = array();

if(empty($_POST['nouveau_titre'])){
    $errors = $_SESSION['flash']['danger'] = "Vous n'avez pas renseigner de titre";
}

if(empty($_POST['nouveau_contenu'])){
    $errors = $_SESSION['flash']['danger'] = "Vous n'avez pas renseigner de contenu";
}

if(empty($errors)) {

    $req = $pdo->prepare("UPDATE articles SET titre = ?, contenu = ? WHERE id = ?");
    $req->execute([$_POST['nouveau_titre'], $_POST['nouveau_contenu'], $_GET['id']]);
    $_SESSION['flash']['success'] = 'Article édité avec succés !';
    }
}



?>

<?php require 'inc/header.php'; ?>

<h1 class="title">Edition de la news : <?= $resNews->titre; ?></h1>

<form action="" method="POST">

    <label for="titre">Titre</label><br>
    <input type="text" value="<?= $resNews->titre; ?>"name="nouveau_titre">
    
    <textarea name="nouveau_contenu" id="editor1" rows="10" cols="80"><?= $resNews->contenu; ?></textarea>
    <button type="submit" class="btn-primary">Envoyer</button>
               
</form>


 <script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>

<?php require 'inc/footer.php'; ?>
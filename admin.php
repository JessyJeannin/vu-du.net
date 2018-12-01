<?php if(session_status()== PHP_SESSION_NONE) {
    session_start();
}
require 'inc/functions.php'; 
admin_log();
?>
<?php 

require 'inc/header.php';
require 'inc/db.php';

if(isset($_POST['titre'], $_POST['contenu'])) {
    if(!empty($_POST['titre']) AND !empty($_POST['contenu'])) {
        $req = $pdo->prepare('INSERT INTO articles SET titre = ?, contenu = ?, card_description = ?, date_publication = NOW()');
        $req->execute([$_POST['titre'], $_POST['contenu'], $_POST['description']]);
        $_SESSION['flash']['success'] = 'Votre article a bien été posté';
    }
    else {
        $_SESSION['flash']['danger'] = 'Veuillez remplir tout les champs';
    }
}


?>

<form action="admin.php" method="POST" class="article-editor">

    <label for="titre">Titre</label>
    <input type="text" name="titre">

    <label for="description">Petite description</label>
    <input type="text" name="description">

    <textarea name="contenu" id="editor1" rows="10" cols="80"></textarea>

<button type="submit" class="btn-primary">Envoyer</button>

</form>

<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'editor1' );
</script>

<?php require 'inc/footer.php'; ?>
<?php require 'inc/db.php'; 

$reqNews = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$reqNews->execute([$_GET['id']]);
$resNews = $reqNews->fetch(PDO::FETCH_OBJ);
?>

<?php require 'inc/header.php'; ?>

<div class="section-article">
    <h1><?= $resNews->titre; ?></h1>
    <span class="day"><?= $resNews->date_publication; ?></span>
    
    <hr>
    
    <section><?= $resNews->contenu; ?></section>
    
    <hr>
    
    <p>PUBLIE DANS <a href="index.php">VU-DU.NET</a></p>
</div>

<?php require 'inc/footer.php'; ?>
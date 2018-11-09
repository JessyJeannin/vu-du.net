<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vu-du.net</title>
</head>

<body>


<div class="modal-bg"></div>
<button type="button" class="modal-click">Mon compte</button>
        <div class="modal-content">
        
            <form method="post">
                <label for="email">Mail</label> <br>
                <input type="mail" name="email"> <br>

                <label for="password">Mot de passe</label> <br>
                <input type="password" name="password"> <br>

                <button type="submit" class="btn-modal">Valider</button>
                <button type="button" class="modal-close">X</button>
                <button type="button" class="btn-modal">Fermer</button>
            </form>
    </div>

<?php require 'inc/footer.php'; ?>
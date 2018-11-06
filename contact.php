<?php require 'inc/header.php'; ?>

<body>
    
<form method="post" class="form">

<div class="form-col-1">

    <fieldset>

        <legend>Nous écrire</legend>

        <div class="col-1">

            <label for="nom">Nom</label>
            <input type="text" name="nom">
            
            <label for="email">Mail</label>
            <input type="mail" name="email">
        
            <label for="phone">Votre téléphone (si vous souhaitez un retour de vive voix)</label>
            <input type="text" name="phone">

        </div>
        
       
            <div class="col-1">
                <label for="choice">Parlons un peu de vous ...</label>
            </div>
            <input type="radio" value="no_site" name="choice" onclick="Change('none');" checked>Je n'ai pas encore de site web mais ça m'interesse <br>
            <input type="radio" value="already_site" name="choice" onclick="Change('block');">J'ai déjà un site web mais je n'en suis pas satisfait(e)
       
        
        <div class="col-1 url" id="url_site">
            <div class="col-2">
                <label>Adresse de votre site internet</label>
            </div>
           <input type="text">
        </div>

    </fieldset>



    <fieldset>

        <legend>Fonctionnalités souhaitées</legend>

        <div class="col-1">
            <label for="fonctionnalites">Je souhaite :</label>
        </div>
        
        <input type="checkbox" id="site_vitrine" value="site_vitrine">
        <label for="site_vitrine">Vitrine web</label> <br>
        <input type="checkbox" id="boutique_en_ligne" value="boutique_en_ligne">
        <label for="boutique_en_ligne">Boutique en ligne/facturation</label> <br>
        <input type="checkbox" id="agenda" value="agenda">
        <label for="agenda">Réservation/Prise de RDV en ligne</label> <br>
        <input type="checkbox" id="acces_doc" value="acces_distant_documents">
        <label for="acces_doc">Accès distant à mes documents professionnels</label> 
        
        <div class="col-1">
            <div class="col-2">
                <label for="">Sujet de votre prise de contact</label>
            </div>
            <input type="text">
        </div>
        
        <div class="col-1">
            <label for="">Message</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>

<div class="col-2">

    <button type="submit" value="envoyer" class="form-button">Envoyer</button>

</div>

    </fieldset>

</div>



</form>

<script type="text/javascript">
function Change(etat)

{
    document.getElementById("url_site").style.display=etat;

}

</script>


<?php require 'inc/footer.php'; ?>
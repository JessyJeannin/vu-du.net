<?php require 'inc/header.php'; ?>

<body class="index">
        <div class="home-text">
        <p>Ne restez pas invisible sur la toile. Offrez vous une présence web pour que votre activité soit reconnue de tous.
    Soyez "Vu-Du.Net" à partir de 30,00€/mois</p>
    </div>
<div></div>

    <div class="section">

        <h1 class="title1" id="produit" id="getFixed">Un domaine, un site</h1>

        <p class="sous-texte">C’est suivant vos besoins que nous définissons les fonctionnalités à implémenter sur votre site internet.</p>

            <section>
            
                <article class="product">
                    <a href="">Responsive <br> Il est important aujourd’hui que votre site web soit lisible aussi bien sur un écran que sur un smartphone.</a>
                </article>
        
                <article class="product">
                    <a href="">Vitrine Web <br> Présentez de façon claire et précise ce que produit/propose votre entreprise à vos Net-visiteurs.</a>
                </article>
        
                <article class="product">
                    <a href="">E-Commerce <br> Optez pour une boutique en ligne afin de vous affranchir des heures de paperasse nécessaire à la facturation client.</a>
                </article>
                
                <article class="product">
                    <a href="">Modules spécifiques <br> Chaque activité vous est propre, c’est pourquoi les besoins sont différents (Prise de RDV, Publications d’évènements,etc…)</a>
                </article>
            </section>
    </div>

    <h1 class="title1" id="about" id="getFixed">Qui sommes nous ?</h1>

    <p class="sous-texte">Vu-Du.Net est une agence Web installée dans le Gers en Occitanie.
Nous concevons des sites internet pour tout type d’activités : de l’association à la PME.
La conception de sites internet gravite autour de 2 sphères : Avoir un beau site internet et un bon référencement. Pour nous, nous envisageons une 3ème sphère toute aussi importante : Répondre efficacement aux besoins spécifiques à l’entreprise. Il faut que le site internet serve aussi en interne à l’entreprise (Facturation cliente, Gestion d’agendas, Réservations de services, Suivi logistique, etc…)
C’est pourquoi nous avons décidé de proposer un socle de base sur lequel nous allons greffer les outils dont vous avez besoin.
</p>
<h1 class="title1" id="service">Nos services</h1>
<section>



    <article class="product">

        <p>
        Dialogue Permanent <br>
        Primordial pour que votre site soit fidèle à votre image, nous discuterons avant et pendant votre souscription chez nous.
        </p>
    </article>
    
    <article class="product">
        <p>
        Support technique <br>
        Nous assurerons le support technique de votre site internet. Sauvegardes, Restaurations, Mises à jour de sécurité, etc…
        </p>
    </article>
    
    <article class="product">
        <p>
        A la carte <br>
        Parce que votre activité est appelée à évoluer dans le temps, vos besoins également : ajouter/retirer les fonctionnalités désirées.
        </p>
    </article>
</section>

<script type="text/javascript">

function fixDiv() {
  var $cache = $('#getFixed'); 
  if ($(window).scrollTop() > 100) 
    $cache.css({'position': 'fixed', 'top': '10px'}); 
  else
    $cache.css({'position': 'relative', 'top': 'auto'});
}
$(window).scroll(fixDiv);
fixDiv();

</script>
</body>

</html>
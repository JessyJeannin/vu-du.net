<?php require 'inc/header.php'; ?>

<body>
    <img class="header-image" src="images/body.jpg" alt="">
        <div class="presentation-text">
        <p>Ne restez pas invisible sur la toile. Offrez vous une présence web pour que votre activité soit reconnue de tous.
    Soyez "Vu-Du.Net" à partir de 30,00€/mois</p>
    </div>
        <div class="body">
        <h1 class="title" id="produit">Un domaine, un site</h1>

        <p class="sous-titre">C’est suivant vos besoins que nous définissons les fonctionnalités à implémenter sur votre site internet.</p>

            <section class="section">
            
                <article class="product">
                   <a href="">
                       <div class="background-product-image">
                            <img class="product-image" src="images/responsive-design-symbol.png" alt="responsive-logo">
                        </div> <br> 
                        <div class="content-product">
                            <span class="product-title">Responsive</span> <br> 
                            Il est important aujourd’hui que votre site web soit lisible aussi bien sur un écran que sur un smartphone.
                        </div>
                    </a>
                </article>
        
                <article class="product">
                 <a href="">
                     <div class="background-product-image">
                         <img class="product-image" src="images/coding.png" alt="coding-logo">
                    </div> <br>
                    <div class="content-product">
                        <span class="product-title">Vitrine Web</span> <br> 
                        Présentez de façon claire et précise ce que produit/propose votre entreprise à vos Net-visiteurs.
                    </div>
                </a>
                </article>
        
                <article class="product">
                 <a href="">
                     <div class="background-product-image">
                       <img class="product-image" src="images/online-shop.png" alt="onlineshop-logo">
                   </div> <br>
                   <div class="content-product">
                       <span class="product-title">E-Commerce</span> <br> 
                       Optez pour une boutique en ligne afin de vous affranchir des heures de paperasse nécessaire à la facturation client.
                   </div>
                </a>
                </article>
                
                <article class="product">
                <a href="">
                    <div class="background-product-image">
                       <img class="product-image" src="images/maintenance.png" alt="maintenace-logo">
                   </div> <br>
                   <div class="content-product">
                       <span class="product-title">Modules spécifiques</span> <br>
                       Chaque activité vous est propre, c’est pourquoi les besoins sont différents (Prise de RDV, Publications d’évènements,etc…)
                   </div>
                </a>
                </article>
            </section>

    <h1 class="title" id="about">Qui sommes nous ?</h1>

    <p class="sous-titre">Vu-Du.Net est une agence Web installée dans le Gers en Occitanie. <br>
Nous concevons des sites internet pour tout type d’activités : de l’association à la PME. <br>
La conception de sites internet gravite autour de 2 sphères : Avoir un beau site internet et un bon référencement. Pour nous, nous envisageons une 3ème sphère toute aussi importante : Répondre efficacement aux besoins spécifiques à l’entreprise. Il faut que le site internet serve aussi en interne à l’entreprise (Facturation cliente, Gestion d’agendas, Réservations de services, Suivi logistique, etc…) <br>
C’est pourquoi nous avons décidé de proposer un socle de base sur lequel nous allons greffer les outils dont vous avez besoin.
</p>

<h1 class="title" id="service">Nos services</h1>

<section class="section">

    <div class="service-section">
    <img src="images/chat.png" alt="">
        <article class="service-article">   
            <p class="sub-service">
            <span class="subtile-product">Dialogue Permanent</span> <br>
            Primordial pour que votre site soit fidèle à votre image, nous discuterons avant et pendant votre souscription chez nous.
            </p>
        </article>
    </div>

    
    <div class="service-section">
    <img src="images/tools-2.png" alt="">
        <article class="service-article">
        
            <p class="sub-service">
            <span class="subtile-product">Support technique</span> <br>
            Nous assurerons le support technique de votre site internet. Sauvegardes, Restaurations, Mises à jour de sécurité, etc…
            </p>
        </article>
    </div>

    
    <div class="service-section">
    <img src="images/coding-2.png" alt="">
        <article class="service-article">
            <p class="sub-service">
            <span class="subtile-product"> A la carte</span> <br>
            Parce que votre activité est appelée à évoluer dans le temps, vos besoins également : ajouter/retirer les fonctionnalités désirées.
            </p>
    
        </article>
    </div>
</section>

<?php require 'inc/db.php'; 

$req =$pdo->prepare("SELECT * FROM articles ORDER by id DESC");
$req->execute();
?>

<h1 class="title" id="news">Dernières nouvelles</h1>

<div class="row-news-card" id="_news">
    
<?php while($res = $req->fetch(PDO::FETCH_OBJ)): ?>

<div class="row-news-card" id="_news">
    <div class="news-card">
        <a href="article.php?id=<?= $res->id; ?>"><span class="card-suite">Lire la suite <i class="fas fa-arrow-right"></i></span></a>
        <div class="card-date">
            <span class="day"><?= $res->date_publication; ?></span>
           <!-- <span class="month">Août</span>
            <span class="year">2018</span>-->
        </div>

        <div class="card-thumb">
            <img src="images/vitrine_web.png <?= $res->card_img; ?>" alt="">
        </div>

        <div class="card-body">
            <h2><?= $res->titre; ?></h2>
            <p><?= $res->card_description; ?></p>
            <?php if (isset($_SESSION['auth']) && $_SESSION['auth']->role_id == 1): ?>
            <div class="card-social">
                <a href="edit.php?id=<?= $res->id; ?>"><i class="far fa-edit"></i></a>
                <a href=""><i class="far fa-trash-alt"></i></a>
            </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endwhile; ?>







            

<?php require 'inc/footer.php'; ?>
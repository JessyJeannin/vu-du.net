<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
?>

<h1 class="title">Votre compte</h1>

<div class="accordeon-menu">
    <div id="accordion">
    
    	<h3 class="accordeon-title">Détails du compte</h3>
        <div class="accordeon-content">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
        
    	<h3 class="accordeon-title">Commandes</h3>
        <div class="accordeon-content">Phasellus mattis tincidunt nibh.</div>
        
    	<h3 class="accordeon-title">Adresse de facturation</h3>
        <div class="accordeon-content">Nam dui erat, auctor a, dignissim quis.</div>
        
        <h3 class="accordeon-title">Moyen de paiement</h3>
        <div class="accordeon-content">Nam dui erat, auctor a, dignissim quis.</div>
        
    </div>
</div>

<script src="../jquery-ui/external/jquery/jquery.js"></script>
<script src="../jquery-ui/jquery-ui.js"></script>
<script>

$( "#accordion" ).accordion( {
    collapsible : true
});

$( "#accordion" ).accordion( {
    active : false
});

// Hover states on the static widgets
$( "#dialog-link, #icons li" ).hover(
	function() {
		$( this ).addClass( "ui-state-hover" );
	},
	function() {
		$( this ).removeClass( "ui-state-hover" );
	}
);
</script>

<?php require 'inc/footer.php'; ?>
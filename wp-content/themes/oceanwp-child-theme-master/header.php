<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- AJOUT DU SCRIPT JQUERY-->


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php oceanwp_theme_strings( 'owp-string-header-skip-link', 'oceanwp' ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>

			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

				<?php do_action( 'ocean_page_header' ); ?>



<!-- Ajout d'une popup pour annoncer la participation au salon -->

<?php
// On récupère les champs ACF nécessaires
$titre=get_field('titre', 161);
$description=get_field('description', 161);
$lieu=get_field('lieu', 161);
$date=get_field('date', 161);
$lien=get_field('lien_google_maps', 161);
?>

<div class="popup-overlay">
	<div class="popup-salon">
		<div class="popup-header">
			<h3><?php echo $titre; ?> </h3>
			<span class="popup-close"><i class="fa fa-times"></i></span>
		</div>
		<?php echo $description; ?>
		<div class="popup-details">
			<div class="popup-address">
				<p><b>Le lieu</b></p>

			  <!-- Utilisation de vardump pour vérifier la var lieu<?phpvar_dump($lieu); ?>-->

				<?php
				// Supprimez les sauts de ligne et autres espaces indésirables
				$lieu_cleaned = trim(str_replace(array("\r", "\n"), '', $lieu));

				// Construit l'URL de recherche Google Maps
				$google_maps_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($lieu_cleaned);
				?>
				<a class="popup-link" href="<?php echo esc_url($google_maps_url); ?>" target="_blank">Voir sur Google Maps</a>
			</div>

			
			<div class="popup-address">
				<p><b>La date</b></p>
				<?php echo $date; ?>
			</div>
		</div>
		<p class="popup-informations">Vous souhaitez plus d'informations concernant cet événement ?</p>
		<?php
		// On insère le formulaire de demandes de renseignements
		echo do_shortcode('[contact-form-7 id="910" title="Formulaire salon New York"]'); // ajout de echo pour afficher le form
		?>

	</div>
</div>

<!-- Code pour fermer la popup -->

<script>
$(document).ready(function(){
    $('.popup-close').click(function(){
        $(this).closest('.popup-salon').hide(); // Masquer la popup
        $('.popup-overlay').hide(); // Masquer l'overlay
    });
});
</script>


<!-- Ajout d'un bouton contact au menu -->

<?php

////////SUPPRESSION DE LA REDECLARATION DE LA FONCTION DU BOUTON 

// On publie le shortcode
add_shortcode('contact', 'contact_btn');

?>

<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Urna
 * @since Urna 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="//gmpg.org/xfn/11" />
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2188645547934309');
fbq('track', 'PageView');
</script>

<!-- End Facebook Pixel Code -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=2188645547934309&ev=PageView&noscript=1"
/></noscript>	
<?php wp_body_open(); ?>

<?php  
	$active_theme = urna_tbay_get_theme();
?>
<div id="wrapper-container" class="wrapper-container">
 
	<?php urna_tbay_get_page_templates_parts('device/offcanvas-smartmenu'); ?>

	<?php urna_tbay_the_topbar_mobile(); ?>
	
		<?php 
		if( urna_tbay_get_config('mobile_footer_icon',true) ) {
			urna_tbay_get_page_templates_parts('device/footer-mobile');
		}
	 ?>

	<?php get_template_part( 'headers/'.$active_theme ); ?>

	<div id="tbay-main-content">
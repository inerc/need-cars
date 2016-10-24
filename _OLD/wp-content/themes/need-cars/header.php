<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage K-STEP
 * @since K-STEP 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php 
	if(is_home())
		echo get_bloginfo('name').' ';
	wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!--[if lt IE 9]>
	<script src="<?= get_template_directory_uri() ?>/js/html5.js"></script>
	<link href="<?= get_template_directory_uri() ?>/css/style-ie.css" rel="stylesheet">
	<![endif]-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--div class="wr-bg">
		<div class="bg"></div>
	</div-->
	<div class="wrapper">
		<div class="main">
			<div class="background">
				<div class="slider">
					<img src="data:image/gif;base64,R0lGODlhEAAJAIAAAP///wAAACH5BAEAAAAALAAAAAAQAAkAAAIKhI+py+0Po5yUFQA7" class="size" />
					<?
						$index = get_page_by_title( 'Главная' );
						if(is_singular())
							$thumb=get_post_meta( get_the_ID(), '_thumbnail_id', true );
						if(empty($thumb) or is_home())
							$thumb=get_post_meta( $index->ID, '_thumbnail_id', true );
						$args = array('post_type' => 'attachment','include' => $thumb);

						$attachments_thumb = get_posts( $args );
						echo '<img class="img now" src="'.$attachments_thumb[0]->guid.'">';
					?>
				</div>
			</div>
			<div class="phone">
				<span><?= get_option( 'thelephone' ) ?></span>
			</div>
			<div class="logo"><a href="/"><img src="<?= get_template_directory_uri() ?>/images/logo.gif" alt=""></a></div>
			<nav class="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'topmenu', 'menu_class' => 'menu', 'container' => false ) ); ?>
			</nav>
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Need-Cars
 * @since Need-Cars 1.0
 */

get_header(); ?>
			<div class="page">
				<div class="content">
					<div class="block" id="content-ltk">
						<h1><? the_title() ?></h1>
						<?=  $post->post_content ?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
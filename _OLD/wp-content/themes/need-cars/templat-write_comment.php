<?php
/*
Template Name: write_comment
*/

get_header(); ?>
			<div class="page">
				<div class="content">
					<div class="block" id="content-ltk">
						<h1><? the_title() ?></h1>
						<?
						comment_form( array( 
						'comment_notes_before' => '',
						'title_reply'          => '',
						'title_reply_to'       => '',
						'title_reply_before'   => '',
						'title_reply_after'    => ''), $post->post_parent );
						?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
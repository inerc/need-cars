<?php
/*
Template Name: comments
*/

get_header(); ?>
			<div class="page">
				<div class="content">
					<div class="block" id="content-ltk">
						<h1><? the_title() ?></h1>
						<div class="commentlist">
							<?
								$args = array(
								'status' => 'approve',
								'number' => '',
								'post_id' => $post->ID,
							);
							$comments = get_comments($args);
							foreach($comments as $comment){
								echo "<div><div class='name'>".$comment->comment_author . '</div><div class="comment-text">' . $comment->comment_content."</div></div><div class=\"clear\"></div>";
}
							?>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
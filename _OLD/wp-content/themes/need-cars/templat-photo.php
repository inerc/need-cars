<?php
/*
Template Name: photo
*/

get_header(); ?>
			<div class="page">
				<div class="content">
					<div class="block" id="content-ltk">
						<h1><? the_title() ?></h1>
						<div class="wr-album">
						<? 
						$albums = get_pages(array("parent"=>get_the_ID(),'sort_column' => "menu_order",'sort_order' => "asc"));
						foreach($albums as $album)
						{
							$photo=array();
							$thumb=get_post_meta( $album->ID, '_thumbnail_id', true );
							$args = array(
								'post_type'   => 'attachment',
								'include'   => $thumb
								);

							$attachments_thumb = get_posts( $args );
							if(!empty($thumb))
								$photo[]=array(wp_get_attachment_image_url( $thumb ), wp_get_attachment_image_url( $thumb, 'full' ),$attachments_thumb[0]->post_title);
							$args = array(
								'post_type'   => 'attachment',
								'numberposts' => -1,
								'post_status' => null,
								'post_parent' => $album->ID,
								'exclude'     => $thumb
								);

							$attachments = get_posts( $args );
							foreach($attachments as $attachment)
								$photo[]=array(wp_get_attachment_image_url( $attachment->ID ), wp_get_attachment_image_url( $attachment->ID, 'full' ),$attachment->post_title);
							echo '<div class="album" id="'.$album->post_name.'">';
							foreach($photo as $n=>$p)
							{
								echo '<a href="'.$p[1].'" data-gallery="#blueimp-gallery-'.$album->post_name.'" title="'.$p[2].'">';
								if(!$n)
									echo '<img src="'.$p[0].'" /><span class="alb-title">'.$album->post_title.'</span>';
								echo "</a>";
							}
							echo "</div>";
						} ?>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
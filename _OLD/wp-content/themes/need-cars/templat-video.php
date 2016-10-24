<?php
/*
Template Name: video
*/

get_header(); ?>
			<div class="page">
				<div class="content">
					<div class="block" id="content-ltk">
						<h1><? the_title() ?></h1>
						<div class="wr-album">
							<div class="album">
							<? 
							$videos = get_post_meta(get_the_ID(), "youtube", false);
							foreach($videos as $video)
							{
								$url=parse_url($video);
								$key=explode('/',$url["path"]);
								echo '<a href="'.$video.'" type="text/html" data-youtube="'.$key[2].'" data-gallery="" poster="http://i.ytimg.com/vi/'.$key[2].'/mqdefault.jpg" class="youtube"><img src="http://i.ytimg.com/vi/'.$key[2].'/mqdefault.jpg" /></a>';
							} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
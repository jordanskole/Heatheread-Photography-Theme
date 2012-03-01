<?php
/**
 * The default template for displaying content
 *
 */
 
 // set up our thumbnail randomness, excluding 'thumbnail'
$randSpan = rand(4,6);
$randThumb = array_rand(array_flip(array("medium","large","full")), 1);
?>
	<? if ( has_post_thumbnail() ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class("span" . $randSpan); ?>>		
				<a href="<? the_permalink(); ?>" class="thumbnail">
					<? the_post_thumbnail("large"); ?>
				</a>
		</article><!-- #post-<?php the_ID(); ?> -->
	<? } ?>
	
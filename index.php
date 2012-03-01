<?

/* wordpress wants us to define use themes to false for some reason */
define('WP_USE_THEMES', false);

/* call the header */
get_header();
?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
		  <? get_sidebar(); ?>
		</div>
		<div id="masonry-container" class="span10">
			<!-- // begin the WordPress Loop -->
			<? if ( have_posts() ) : ?>


				<? /* Start the Loop */ ?>
				<? while ( have_posts() ) : the_post(); ?>

					<? get_template_part( 'content', get_post_format() ); ?>

				<? endwhile; ?>


			<? else : ?>

				

			<? endif; ?>
			<!-- //end the WordPress Loop -->
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?

/* call the footer */
get_footer();

?>
<script>
var $container = $('#masonry-container');

$container.imagesLoaded( function(){
  $container.masonry({
	// options
    itemSelector : '.post'
    columnWidth : '6.382978723%'
    
  });
});
</script>
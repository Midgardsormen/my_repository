<?php
/**
 * The template for displaying all single client posts and attachments
 *
 */

get_header(); ?>

  <!-- .page-client-fiche -->
  <div id="content" class=" page-content page-client-fiche">

    
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();		 
		?>
		<div class="entete">
			<div class="container">
				<div class="row">
				  <div class="col-xs-12">
					<div class="main-title icon-title">
					  <i class="icon icon-clients">
						<i class="icon path1"></i>
						<i class="icon path2"></i>
						<i class="icon path3"></i>
					  </i>
					  <h2><span><?php the_title(); ?></span></h2>
					  <div class="baseline">
						<a href="<?php echo esc_url( get_permalink(get_page_by_path( 'clients' )) ); ?>" class="back">Retour aux références</a>
					  </div>
					</div>
				  </div>
				</div>
			  </div>

		</div>
		<?php	

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'client' );
			// End of the loop.
		endwhile;
		?>

</div><!-- .page-client-fiche -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

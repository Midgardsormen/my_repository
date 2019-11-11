<?php
/**
 * The template for displaying pages
 *
 */

get_header(); ?>

  <!-- .page -->
  <div id="content" class=" page-content">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>  
  </div>

  
<?php get_footer(); ?>

<?php
/**
 * The template for displaying archive pages
 *
 */

get_header(); ?>

  <div id="content" class=" page-content ">

		<?php if ( have_posts() ) : ?>
  <div id="content" class="page">
    <div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              <i class="icon icon-recrutement">
                <i class="icon path1"></i>
                <i class="icon path2"></i>
                <i class="icon path3"></i>
              </i>
              <?php the_archive_title( '<h2><span>', '</span></h2>' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>


			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'singleline' ); /* get_post_format() */

			// End the loop.
			endwhile;


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

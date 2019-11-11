<?php
/**
 * The template for displaying archive pages
 *
 */

get_header(); ?>

 

		<?php if ( have_posts() ) : ?>

			  <!-- .recrutement -->
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
              <h2><span>Métier recherché :</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="t3Outer">
	<?php the_title( '<p>','</p>' ); ?>
    <span class="line"></span>
  </div>

		<div class="entete">
		  <div class="container">
			<div class="row">
			  <div class="col-xs-12">
				<div class="main-title icon-title">
					
				  
				</div>
				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			  </div>
			</div>
		  </div>
		</div>
<section class="listing_offres">
  <div class="searchBarSection">
    <?php
    
    $loop = new WP_Query( array( 'post_type' => 'postes', 'posts_per_page' => 7 ) );
    while ( $loop->have_posts() ) : $loop->the_post();
    endwhile;
      ?>
      <p>Filtrer par : </p>
      <?php do_action('show_beautiful_filters'); ?>
      <?php
  while ( have_posts() ) : the_post();    
    ?>
  <?php endwhile;?>
    <div class="introText">
         <?php
        
 the_field('presentation_du_cabinet', 397); ?>
      
    </div>
     
    
  </div>
   <div class="listingSection">
    <?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
<div class="listDataRecrutementContainer">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'singleline-postes' ); /* get_post_format() */

			// End the loop.
			endwhile;


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div>
<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
</div>

	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

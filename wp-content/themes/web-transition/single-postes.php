<?php
/**
 * The template for displaying all single client posts and attachments
 *
 */

get_header(); ?>

  <!-- .page-client-fiche -->
  <div id="content" class=" page-content page-offre">

    
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();		 
		?>
		<div class="col-xs-12 maw1170">
            <div class="main-title icon-title">
              <i class="icon icon-recrutement">
                <i class="icon path1"></i>
                <i class="icon path2"></i>
                <i class="icon path3"></i>
              </i>
              <h2><span>Recrutement</span></h2>
            </div>
          </div>
          <div class="t3Outer">
      <div class="tIntro">
        Une question ou juste pour dire bonjour, laissez nous votre message !
      </div>
      <!--INTROLINKS-->
      <div class="tItemContainer">
        <div class="tSubHeader">Pour accompagner son développement rapide,</div>
        <div class="tText">Web Transition cherche sans cesse de nouveaux talents</div>
        <!--LINKS-->
      </div>
    <span class="line"></span>
  </div>
		<?php	

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'postes' );
			// End of the loop.
		endwhile;
		?>

</div><!-- .page-client-fiche -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

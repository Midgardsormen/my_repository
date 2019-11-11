<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 */
?>
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
             <h2><span><?php _e( 'Aucun résultat trouvé', 'webtransition' ); ?></span></h2>
            </div>
          </div>
        </div>
      </div>
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
<section class="no-results not-found">
	<section class="container bg-wt posts">
      <s class="a transp"></s><s class="b"></s>
      <div class="row">
        <div class="col-xs-12">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'webtransition' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'webtransition' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'Votre recherche n\'a donné aucun résultat.', 'webtransition' ); ?></p>
			<div class="retourBouton">
						<p><a id="backLink" href="#" class="back">Retour</a></p>
					  </div>
			<?php get_search_form(); ?>

		<?php endif; ?>
		</div>
		</div>
	</section>
</section><!-- .no-results -->
</div>
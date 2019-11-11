<?php
/**
 * The template for displaying all single posts and attachments
 *
 */

get_header(); ?>

  <!-- .page-actu -->
  <div id="content" class=" page-content page-actu">

    
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		 
			 $categories = get_the_terms($post->ID, 'category');
			 $title_cat = "";
			 foreach($categories as $c){
				if(!$c->parent)
					$title_cat=$c->name;
			 }
		?>
		<div class="entete">
		  <div class="container">
			<div class="row">
			  <div class="col-xs-12 col-sm-10 col-sm-push-1">
				<div class="main-title icon-title">
				  
				  <div class="baseline">
					  <a href="<?php echo esc_url( get_permalink(get_page_by_path( 'actualites' )) ); ?>" class="back">Retour aux actualités</a>
				  </div>
				</div>
				<?php the_title( '<h1>', '</h1>' ); ?>
				<hr/>
			  </div>
			</div>
		  </div>
		</div>
		<?php	

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			/*if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}*/

			// End of the loop.
		endwhile;
		?>

</div><!-- .page-actu -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

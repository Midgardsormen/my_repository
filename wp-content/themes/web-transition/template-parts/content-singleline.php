<?php
/**
 * The template part for displaying single posts
 *
 */

?>



    <section class="container post" id="post-<?php the_ID(); ?>">
      <div class="row">
        <div class="col-xs-12">
		<?php 
				$image = get_field('image_de_couverture');
				if( !empty($image) ): 
			?>
				<!--<div class="img-couv">
					<img src="<?php echo $image['sizes'][ 'actus-img' ] ?>" alt="Visuel">
				</div>-->
			<?php endif; ?>
		  <a href="<?php the_permalink(); ?>">
			<h3><?php the_title(); ?></h3>
		  </a>
			<?php the_excerpt(); ?>
		
		  <hr/>
        </div>
      </div>
    </section>
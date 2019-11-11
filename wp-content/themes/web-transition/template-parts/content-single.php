<?php
/**
 * The template part for displaying single posts
 *
 */

?>



    <section class="container post" id="post-<?php the_ID(); ?>">
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-push-1">
		<?php 
			$afficher_une_video = get_field('afficher_une_video');
			if($afficher_une_video):
			?>
				<div class="iframe-wrapper ratio16-9">
					<iframe src="<?php echo get_field('video')?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php else :
				$image = get_field('image_de_couverture');
				if( !empty($image) ): 
			?>
				<div class="img-couv">
					<img src="<?php echo $image['sizes'][ 'actus-img' ] ?>" alt="Visuel">
				</div>
			<?php endif; endif;?>
		  
		  
		  
		  
		  <?php the_content(); ?>
        </div>
      </div>
    </section>
	<?php
		$posts = get_field('articles_connex');
		if( $posts ):?>
	<section class="further round-posts">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-push-2">
            <div class="main-title icon-title">
              <h2 class="xs-without-line"><span>à Lire / à voir</span></h2>
              <div class="baseline">
                Sur le même sujet
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-10 col-xs-push-1 center">

			<?php
			
			
			foreach( $posts as $post):
				setup_postdata($post); 

				$image = get_field('image_de_couverture');
				$categories = get_the_terms($post->ID, 'category');
				$cat_display = "";
				
				?>
				<article class="<?php foreach($categories as $c){echo " ".$c->slug; $cat_display .= ($c->slug<>"actualite" and $c->slug<>"archive" and $c->slug<>"non-classe")?$c->name:"";} ?>">
				  <a href="<?php the_permalink(); ?>">
					<div class="img-box round">
					  <i class="wrapper ratio1" style="background-image:url(<?php echo $image['sizes'][ 'xs-img' ] ?>);">
					  </i>
					</div>
				  </a>
				  <div class="txt">
					<span class="tag"><?php echo $cat_display; ?></span>
					<hr/>
					<h5>
					  <?php the_title();?>
					</h5>
				  </div>
				</article>				
				<?php

			endforeach;?>
		  </div>
        </div>
      </div>
    </section>
		<?php 
		wp_reset_postdata();
		endif;
		?>
    

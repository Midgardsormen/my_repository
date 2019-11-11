<?php
/**
 * The template part for displaying single client posts
 *
 */

?>


	<section class="container" id="post-<?php the_ID(); ?>">
		<?php  $desc3 = get_field('descriptif_axe_3'); 
		if( !empty($desc3) ): ?>
      <div class="desc oneAxe">
        <div class="row row1 ">
          
	      <div class="col-xs-12 col-md-6 no-gutter">
	        <div class="txt pt480 pt-auto-sm" style="background-color:<?php the_field('couleur_de_fond');?>;padding-top:<?php the_field('hauteur_de_bloc');?>em;">
	          <div class="wrapper alignWrapper">
                <div class="centrageWrapper ">
	            <?php the_field('descriptif_axe_1');?>
	        </div>
	          </div>
	        </div>

	      </div>
	      <div class="col-md-6 no-nav-desktop-gutter hide-mobile">
          	<div class="img-box " style="height:<?php the_field('hauteur_de_bloc');?>em;">
            	<?php get_field('photo'); ?>
				<?php 
				$image = get_field('photo');
				if( !empty($image) ): ?>
					<img class="imgOneAxe" src="<?php echo $image["url"] ?>" alt="" style="max-height:<?php the_field('hauteur_de_bloc');?>em;">
				<?php else: ?>
					<i class="wrapper pt480 ratio16-9-sm" style="background-image:url(media/clients/entete.jpg);"></i>
				<?php endif?>
            </div>
        </div>
	  </div>
	  <?php $image = get_field('logo');
			  if( !empty($image) ): ?>
			<i class="logo" style="background-image:url('http://www.web-transition.com/wp-content/uploads/2018/04/logoSeul.png'); background-repeat:no-repeat; background-size: 90%; background-position: center center;"></i>
		<?php endif; ?>
		<div class="row ">
          
          <div class="col-xs-12 col-md-6 no-gutter">
            <div class="txt pt480 pt-auto-sm mobileOrange" style="background-color:<?php the_field('couleur_de_fond_2');?>;padding-top:<?php the_field('hauteur_de_bloc');?>em;">
              <div class="wrapper alignWrapper">
                <div class="centrageWrapper "><?php the_field('descriptif_axe_2');?></div>
              </div>
            </div>

          </div>
          <div class="col-xs-12 col-md-6 no-gutter">
            <div class="txt pt480 pt-auto-sm mobileYellow" style="background-color:<?php the_field('couleur_de_fond');?>;padding-top:<?php the_field('hauteur_de_bloc');?>em;">
              <div class="wrapper alignWrapper">
                <div class="centrageWrapper "><?php the_field('descriptif_axe_3');?></div>
              </div>
            </div>

          </div>
        </div>
        <?php else: ?>
      <div class="desc twoAxe">
        <div class="row hide-mobile">
          <div class="col-md-12 no-nav-desktop-gutter">
        
            <div class="img-box col-xs-12 col-md-6">
            	<?php get_field('photo'); ?>
				<?php 
				$image = get_field('photo');
				if( !empty($image) ): ?>
				<img class="imgTwoAxe" src="<?php echo $image["url"] ?>" alt="">
					
				<?php else: ?>
					<i class="wrapper pt480 ratio16-9-sm" style="background-image:url(media/clients/entete.jpg);"></i>
				<?php endif?>
            </div>
          </div>
      	</div>
      	
      	<div class="row">
      		<div class="col-xs-12 col-md-6 no-gutter">
            <div class="txt pt480 pt-auto-sm" style="background-color:<?php the_field('couleur_de_fond');?>;padding-top:<?php the_field('hauteur_de_bloc');?>em;">
              <div class="wrapper">
                <?php the_field('descriptif_axe_1');?>
              </div>
            </div>

          </div>
          <div class="col-xs-12 col-md-6 no-gutter">
            <div class="txt pt480 pt-auto-sm mobileOrange" style="background-color:<?php the_field('couleur_de_fond_2');?>;padding-top:<?php the_field('hauteur_de_bloc');?>em;">
              <div class="wrapper">
                <?php the_field('descriptif_axe_2');?>
              </div>
            </div>

          </div>
          <?php $image = get_field('logo');
			  if( !empty($image) ): ?>
			<i class="logo" style="background-image:url('http://www.web-transition.com/wp-content/uploads/2018/04/logoSeul.png'); background-repeat:no-repeat; background-size: 90%; background-position: center center;"></i>
		<?php endif; ?>
      	</div>
      	<?php endif?>
          
        </div>
		
      </div>
	  <?php 
	  $afficher_un_testimonial = get_field('afficher_un_testimonial');
	  if($afficher_un_testimonial):?>
      <div class="cit">
        <div class="row">
          <div class="col-xs-10 col-xs-push-1 col-md-8 col-md-push-2">
            <em style="color: <?php the_field('couleur_de_fond');?>;">
              <?php the_field('testimonial');?>
            </em>
            <div class="signature"><?php the_field('auteur');?> 
				<?php $fonction_de_lauteur = get_field('fonction_de_lauteur');
				if($fonction_de_lauteur):?>
				<span class="titre"><?php echo $fonction_de_lauteur;?></span>
				<?php endif; ?>
			</div>
          </div>
        </div>
      </div>
	  <?php endif;?>
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
    

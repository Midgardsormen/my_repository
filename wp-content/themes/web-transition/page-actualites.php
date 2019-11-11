<?php

/*
Template Name: Page Actualités
*/
get_header(); 
?>

<!-- .page-actus -->
  <?php
	while ( have_posts() ) : the_post();
		?>
		
  <!-- .actus -->
  <div id="content" class=" page-content page-actus">

    <div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              
              <h2><span>Actualités</span></h2>
            </div>
          </div>
        </div>
      </div>


    </div>
    <section id="patchwork" class="container bg-wt bg-wt-middle posts">
      <s class="a transp"></s><s class="b"></s>
      <div class="row">
        <div class="col-xs-12">
		  <div class="filters">
		  <?php
				// récupération de l'id de la catégorie parente
				$idObj = get_category_by_slug('actualite'); 
				$actus_term_id = $idObj->term_id;
				// sélection des catégories enfants (uniquement celles utilisées)
				$categories=get_terms(
				array(
					'taxonomy' 		=> 'category',
					'hide_empty' 	=> true,
					'parent'		=> $actus_term_id
					
				));
				
				foreach($categories as $cat){
					$c = get_term($cat);?>
					<button class="cta2" id="<?php echo $c->slug?>"><?php echo $c->name?></button>
			<?php }	?>
          </div>
        </div>
      </div>
      <div class="row ensembleSquareActus">
		<?php
			//global $wp_query;
			$my_query = new WP_Query( array(
		    	'posts_per_page'	=> 12,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post_type'		=> 'post',
				'cat'			=> $actus_term_id
				
		    ) );			
			
			while ( $my_query->have_posts() ) : $my_query->the_post();			
				// Include the realisation post content template.
				//get_template_part( 'template-parts/content', 'realisation' );
				// wp_reset_postdata();
				$categories = get_the_terms($post->ID, 'category');
				?>
				<?php ?>
				<div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-0 col-md-4  col-md-push-0 squareActus">
				  <article class="<?php foreach($categories as $c){echo " ".$c->slug;} ?>" <?php $image = get_field('image_de_couverture');
							if( !empty($image) ): ?>style="background-image:url(<?php echo $image['sizes'][ 'thumb-actus-img' ] ?>);"<?php endif; ?>>

					<a href="<?php the_permalink(); ?>">
					  
					  
					  
					  
					  <div class="txt">
						<div>
						<?php if(get_the_date()): ?>
						<span class="date">Posté le <?php echo get_the_date('d/m/Y');?></span>
						<?php endif; ?>
						<h5>
						  <?php the_title(); ?>
						</h5>
						<p>
							<?php  
            $prep = get_the_excerpt(); 
            
            $prep = strip_tags($prep);
            
           // echo substr($prep,1);
            
            
            $prep   = substr($prep, 0, 100);
            $lastSpace = strrpos($prep, ' ');
            $prep   = substr($prep, 0, $lastSpace);
            $prep  .= '...';
            
            echo $prep;
           ?> 
						</p>
						</div>
					  </div>
					</a>
				  </article>
				</div>

				<?php
			endwhile; 
		?>
     </div>
    </section>
<?php
  /*
    <section id="patchwork2" class="container round-posts">
      <div class="row">
        <div class="col-xs-12">
          <div class="main-title icon-title" >
            <h2><span>Archives</span></h2>
            <div class="baseline">
              Vidéos, slideshare et autre médias
            </div>
          </div>
          <div class="filters">
		  <?php
				// récupération de l'id de la catégorie parente
				$idObj = get_category_by_slug('archive'); 
				$actus_term_id = $idObj->term_id;
				// sélection des catégories enfants (uniquement celles utilisées)
				$categories=get_terms(
				array(
					'taxonomy' 		=> 'category',
					'hide_empty' 	=> true,
					'parent'		=> $actus_term_id
					
				));
				
				foreach($categories as $cat){
					$c = get_term($cat);?>
					<button class="cta2" id="<?php echo $c->slug?>"><?php echo $c->name?></button>
			<?php }	?>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-xs-12 center">
		<?php
			//global $wp_query;
			$my_query = new WP_Query( array(
		    	'posts_per_page'	=> 10,
				'orderby'        => 'date',
				'order'          => 'ASC',
				'post_type'		=> 'post',
				'cat'			=> $actus_term_id
				
		    ) );			
			
			while ( $my_query->have_posts() ) : $my_query->the_post();			
				// Include the realisation post content template.
				//get_template_part( 'template-parts/content', 'realisation' );
				// wp_reset_postdata();
				$categories = get_the_terms($post->ID, 'category');
				$cat_display = "";
				?>
				<?php ?>
          <article class="<?php foreach($categories as $c){echo " ".$c->slug; $cat_display .= ($c->slug<>"archive" and $c->slug<>"non-classe")?$c->name:"";} ?>">
            <a href="<?php the_permalink(); ?>">
              <s></s>
				<?php $image = get_field('image_de_couverture');
							if( !empty($image) ): ?>	  
              <div class="img-box ">
                <i class="wrapper ratio1" style="background-image:url(<?php echo $image['sizes'][ 'xs-img' ] ?>);">
                </i>
              </div>
			  <?php endif; ?>

              <div class="txt">
                <span class="tag"><?php echo $cat_display; ?></span>
                <hr/>
                <h5>
                  <?php the_title(); ?>
                </h5>
              </div>
            </a>
          </article>
		  <?php
			endwhile; 
		?>
          </div>
      </div>
    </section>
    */ ?>
  </div>

<?php endwhile;?>

<?php get_footer(); ?>
		  
	
  


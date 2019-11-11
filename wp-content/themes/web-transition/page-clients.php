<?php

/*
Template Name: Page Clients
*/
get_header(); 
?>

  <!-- .page-clients -->
  <?php
	while ( have_posts() ) : the_post();
		?>
  <div id="content" class=" page-content page-clients">

    <div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              <i class="icon icon-clients">
                <i class="icon path1"></i>
                <i class="icon path2"></i>
                <i class="icon path3"></i>
              </i>
              <h2><span>Clients</span></h2>

            </div>
          </div>
          <div class="col-xs-12 col-md-10 col-md-push-1 col-lg-10 col-lg-push-1">
            <div class="wrap-intro">
              <!--<h4>Nos références, notre fierté</h4>-->
              <?php the_content() ?>
            </div>
            <i class="sep"></i>
            <p>
              Cliquez sur les miniatures pour accéder <strong class="couleur1">aux études de cas</strong>
            </p>
          </div>
        </div>
      </div>


    </div>

    <section id="patchwork" class="container bg-wt bg-wt-b-mb6 bg-wt-a-mt15">
      <s class="a transp"></s><s class="b"></s>
      <div class="row ">
        <div class="col-xs-12 col-md-10 col-md-push-1 col-lg-10 col-lg-push-1 patchwork-gutter">
          <div class="patchwork-wrap">
		  <?php
		  if( have_rows('les_clients') ):

			// loop through the rows of data
			
			while ( have_rows('les_clients') ) : the_row();
				$client = get_sub_field('client');
				$logo_size = get_sub_field('logo_size');
				global $post;
				$post = $client;
				setup_postdata($post);
				?>
				<article>
				<?php 
				$link = "#";
				if (get_field('fiche_client')==1){
					$link = get_permalink();
				}
				if($link!="#"):
				?>
				<a href="<?php echo $link; ?>">
				<?php endif;?>
					<div class="img-box round">
						<?php $image = get_field('logo');
								if( !empty($image) ): ?>
					  <i class="wrapper ratio1" style="background-image:url(<?php echo $image['sizes'][ 'xs-img' ] ?>); background-repeat: no-repeat; background-size: <?php echo $logo_size;?>%; background-position: center center; ">
					  </i>
					  <?php endif; ?>
					</div>
				<?php if($link!="#"):?>
				</a>
				<?php endif;?>
			  </article>
				<?php
				wp_reset_postdata();
			endwhile;
		endif;
		  ?>

          </div>
        </div>
      </div>
    </section>
  </div>

<?php endwhile;?>

<?php get_footer(); ?>
		  
	
  


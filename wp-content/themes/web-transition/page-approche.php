<?php

/*
Template Name: Page Approche
*/
get_header(); 
?>

  <!-- .page-approche -->
  <?php
	while ( have_posts() ) : the_post();
		?>
  <div id="content" class=" page-content page-approche">

    <div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              <i class="icon icon-picto_approche">
                <i class="icon path1"></i>
                <i class="icon path2"></i>
                <i class="icon path3"></i>
                <i class="icon path4"></i>
                <i class="icon path5"></i>
                <i class="icon path6"></i>
                <i class="icon path7"></i>
                <i class="icon path8"></i>
                <i class="icon path9"></i>
              </i>
              <h2 class="xs-without-line"><span>Approche</span></h2>
            </div>
          </div>

        </div>
      </div>
    </div>
    <section class="container post ">
      <div class="row">
        <div class="col-xs-10 col-xs-push-1 col-sm-8 col-sm-push-2">
          <?php the_field('introduction'); ?>
          <hr/>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-10 col-xs-push-1 col-sm-12 col-sm-push-0 blocs">
          <div class="bg-grey"></div>
          <div class="yellow-bloc yellow1 bloc bloc-left">
            <div class="wrapper">
              <h3>#1<br/><?php the_field('titre'); ?></h3>
              <hr class="white"/>
              <div class="wrap">
                <?php the_field('contenu'); ?>
              </div>
            </div>
          </div>

          <div class="img-bloc img1 bloc bloc-right" >
		  <?php $image = get_field('image_de_fond_1');
				if( !empty($image) ): ?>
					<div class="img" style="background-image: url(<?php echo $image['url']?>); padding-top:84.164859%;">
				<?php else:?>
					<div class="img" style="padding-top:84.164859%;">
				<?php endif;?>
				
              <div class="wrapper">
                <div class="txt">
                  <h3>
                    Stop<span class="em17">ou</span>encore
                  </h3>
                  <span class="baseline">Vous choisissez!</span>
                </div>
              </div>
            </div>
          </div>

          <div class="yellow-bloc yellow2 bloc bloc-right">
            <div class="wrapper">
              <h3>#2<br/><?php the_field('titre_2'); ?></h3>
              <hr class="white"/>
              <div class="wrap">
                <?php the_field('contenu_2'); ?>
              </div>
            </div>
          </div>

          <div class="yellow-bloc yellow3 bloc bloc-left">
            <div class="wrapper">
              <h3>#3<br/><?php the_field('titre_3'); ?></h3>
              <hr class="white"/>
              <div class="wrap">
                <?php the_field('contenu_3'); ?>
              </div>
            </div>
          </div>

          <div class="img-bloc img2 bloc bloc-right" >
		  <?php $image = get_field('image_de_fond_2');
				if( !empty($image) ): ?>
					<div class="img" style="background-image: url(<?php echo $image['url']?>); padding-top:70.14028056112224%;">
				<?php else:?>
					<div class="img" style="padding-top:70.14028056112224%;">
				<?php endif;?>

				<div class="wrapper">
                <div class="txt">
                  <h3>
                    Résultat garanti
                  </h3>
                  <span class="baseline">Vraiment !</span>
                </div>
              </div>
            </div>
          </div>

          <div class="yellow-bloc yellow4 bloc bloc-right">
            <div class="wrapper">
              <h3>#4<br/><?php the_field('titre_4'); ?></h3>
              <hr class="white"/>
              <div class="wrap">
                <?php the_field('contenu_4'); ?>
              </div>
            </div>
          </div>


          <div class="img-bloc img3 bloc bloc-left" >
		  <?php $image = get_field('image_de_fond_3');
				if( !empty($image) ): ?>
					<div class="img" style="background-image: url(<?php echo $image['url']?>); padding-top:67.7%;">
				<?php else:?>
					<div class="img" style="padding-top:67.7%;">
				<?php endif;?>
              <div class="wrapper">
                <div class="txt">
                  <h3 class="p0">
                    Centre de formation agréé
                  </h3>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </div>

<?php endwhile;?>

<?php get_footer(); ?>
		  
	
  


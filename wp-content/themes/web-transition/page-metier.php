<?php

/*
Template Name: Page Métier
*/
get_header(); 
?>
		
  <!-- .page-metiers -->
  <?php
	while ( have_posts() ) : the_post();
		?>
  <div id="content" class=" page-content page-metiers">

    <div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              <i class="icon icon-picto_metier">
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
              <h2 class="xs-without-line"><span>Métiers</span></h2>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="bg-container">
      <div class="bg-grey"></div>
      <section class="container post ">
        <div class="row">
          <div class="col-xs-10 col-xs-push-1 ">
            <?php the_field('introduction'); ?>
            <hr/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-10 col-md-push-1 ">
            <div id="tabs">


              <input id="tab1" type="radio" name="tabs" checked>
              <label for="tab1" class="w1-3"><span>Cadrage<br/>de projet</span></label>

              <input id="tab2" type="radio" name="tabs">
              <label for="tab2" class="w1-3"><span>Mise en oeuvre<br/>et déploiement</span></label>

              <input id="tab3" type="radio" name="tabs">
              <label for="tab3" class="w1-3 one-line"><span class="">Exploitation</span></label>


              <section id="content1">
                <?php the_field('introduction_1'); ?>
                <hr class="white"/>
                <div class="blocs">
					<?php
					if( have_rows('blocs_1') ):
						while ( have_rows('blocs_1') ) : the_row();
							$image = get_sub_field('logos');
							?>
							
							  <div class="bloc " style="background-image: url(<?php echo $image['url'] ?>);">
								<div class="entete">
								  <?php the_sub_field('titre'); ?>
								  <hr class="sm white">
								  <span>Ils nous font confiance!!!</span>
								</div>
							  </div>

						<?php endwhile;

					endif;
					?>
                </div>
                <div class="blocs">
                  <div class="wt-bloc">
                    <div class="wrapper">
                      <h5>Notre valeur ajoutée</h5>
                      <?php the_field('notre_valeur_ajoutee_1'); ?>
                    </div>
                  </div>
                </div>
              </section>

              <section id="content2">
                <?php the_field('introduction_2'); ?>
                <hr class="white"/>
                <div class="blocs entete4l">
				      <div class="blocs">
						<?php
						if( have_rows('blocs_2') ):
							while ( have_rows('blocs_2') ) : the_row();
								$image = get_sub_field('logos');
								?>
								
								  <div class="bloc " style="background-image: url(<?php echo $image['url'] ?>);">
									<div class="entete">
									  <?php the_sub_field('titre'); ?>
									  <hr class="sm white">
									  <span>Ils nous font confiance!!!</span>
									</div>
								  </div>

							<?php endwhile;

						endif;
						?>
					</div>
          
				

                </div>
                <div class="blocs">
                  <div class="wt-bloc">
                    <div class="wrapper">
                      <h5>Notre valeur ajoutée</h5>
                      <?php the_field('notre_valeur_ajoutee_2'); ?>
                    </div>
                  </div>
                </div>
              </section>

              <section id="content3">
                <?php the_field('introduction_3'); ?>
                <hr class="white"/>
                <div class="blocs entete2l">
                  <?php
					if( have_rows('blocs_3') ):
						$cpt=1;
						while ( have_rows('blocs_3') ) : the_row();
							$image = get_sub_field('logos');
							if($cpt==5):?>
							</div>
							<div class="blocs entete3l">
							<?php endif; ?>
							
							  <div class="bloc " style="background-image: url(<?php echo $image['url'] ?>);">
								<div class="entete">
								  <?php the_sub_field('titre'); ?>
								  <hr class="sm white">
								  <span>Ils nous font confiance!!!</span>
								</div>
							  </div>

						<?php $cpt++;
						endwhile;
						$image = get_field('notre_valeur_ajoutee_logos_3');
						
						?>
					<div class="wt-bloc double" style="background-image: url(<?php echo $image['url'] ?>);">
						<div class="wrapper">
						  <h5>Notre valeur ajoutée</h5>
						  <?php the_field('notre_valeur_ajoutee_3'); ?>
						</div>
				    </div>
						
					<?php endif; ?>
                </div>
              </section>
            </div>

          </div>
        </div>
      </section>
      <div class="bg-metier">
        <section class="container bg-wt bg-wt-a-mt13 bg-wt-b-mb7 boost">
          <s class="a transp "></s><s class="b transp-75"></s>
          <div class="row">
            <div class="col-xs-10 col-xs-push-1 col-sm-10 col-sm-push-1 col-md-6 col-md-push-3">
              <?php the_field('outro'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-push-1">
              <a href="<?php echo esc_url( get_permalink(get_page_by_path( 'clients' )) ); ?>" class="cta yellow">Voir nos clients</a>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

 
<?php endwhile;?>

<?php get_footer(); ?>
		  
	
  


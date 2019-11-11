<?php

/*
Template Name: Page Qui sommes-nous?
*/
get_header(); 
?>

<!-- .page-qui-sommes-nous -->
  <?php
	while ( have_posts() ) : the_post();		
		?>
		
  <!-- .page-qui-sommes-nous -->
  <div id="content" class=" page-content page-qui-sommes-nous">

    <div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              <i class="icon icon-qui-sommes-nous">
                <i class="icon path1"></i>
                <i class="icon path2"></i>
                <i class="icon path3"></i>
              </i>
              <h2 class="xs-without-line"><span>Qui sommes-nous?</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="container post ">
      <div class="row">
        <div class="col-xs-10 col-xs-push-1 col-sm-10 col-sm-push-1">
          <?php the_field('introduction');?>
          <hr/>
        </div>
      </div>
      <div class="row timbres">
        <div class="col-xs-12 col-sm-4 ">
          <div class="wrap">
            <h2>
              <div class="bold ">Depuis</div>
              <div class="white em78">2011</div>
            </h2>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 ">
          <div class="wrap ">
            <h2 class="city">
              <div class="wrap-city lille">
                <span class="em22 ">Lille</span>
                <svg class="symb" width="100%" height="100%" viewBox="0 0 27 68" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;">
                    <path d="M1.904,29.86l-0.341,22.698l22.897,0.344l0.341,-22.698l-22.897,-0.344Z" style="fill:none;stroke:#fff;stroke-width:3.13px;"/><path d="M20.404,41.362c0,4 -3.3,7.3 -7.3,7.3c-4,0 -7.3,-3.3 -7.3,-7.3c0,-4 3.3,-7.3 7.3,-7.3c4.1,0 7.3,3.3 7.3,7.3" style="fill:none;stroke:#fff;stroke-width:3.13px;"/><path d="M3.731,52.586l-0.193,12.799l17.798,0.268l0.193,-12.799l-17.798,-0.268Z" style="fill:none;stroke:#fff;stroke-width:3.13px;"/><path d="M4.304,28.962l0.1,-8.3l2.7,0.1l2.1,-9l2.8,0.1l1.8,-10.3" style="fill:none;stroke:#fff;stroke-width:3.13px;"/><path d="M22.404,29.262l0.1,-8.3l-2.6,0l-1.9,-9l-2.8,-0.1l-1.4,-10.3" style="fill:none;stroke:#fff;stroke-width:3.13px;"/>
                  </svg>
              </div>
              <span class="em90 light">&</span>
              <div class="wrap-city paris">
                <svg class="symb"  width="100%" height="100%" viewBox="0 0 44 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                                <g transform="matrix(1,0,0,1,-77.9,-69.9)">
                                    <path d="M107.7,127C107.3,121.6 103.3,118.8 99.4,118.8C95.5,118.8 91.6,121.6 91.1,127L83.1,127L90.6,114.9L107.7,114.9L115.1,127L107.7,127ZM95.9,103.3L98.2,103.3L98.2,112.8L92.6,112.8L95.9,103.3ZM98.3,85.4L100.1,85.4L101.7,101.2L96.8,101.2L98.3,85.4ZM99.1,78.4C100.5,78.4 101.5,79.5 101.5,80.8C101.5,82.1 100.4,83.2 99.1,83.2C97.8,83.2 96.7,82.1 96.7,80.8C96.7,79.5 97.7,78.4 99.1,78.4ZM102.5,103.3L105.7,112.8L100.2,112.8L100.2,103.3L102.5,103.3ZM119.7,127L117.5,127L110,114.9L113.1,114.9C113.6,114.9 114.2,114.4 114.2,113.8C114.2,113.2 113.7,112.7 113.1,112.7L108,112.7L104.8,103.2L109,103.2C109.5,103.2 110.1,102.8 110.1,102.1C110.1,101.5 109.6,101 109,101L103.8,101L102.1,84.2C103,83.4 103.7,82.1 103.7,80.7C103.7,78.6 102.2,76.8 100.2,76.3L100.2,71C100.2,70.5 99.8,69.9 99.1,69.9C98.6,69.9 98,70.4 98,71L98,76.2C96,76.6 94.5,78.5 94.5,80.6C94.5,82 95.1,83.2 96.1,84.1L94.4,100.9L89.9,100.9C89.4,100.9 88.8,101.3 88.8,102C88.8,102.6 89.3,103.1 89.9,103.1L93.5,103.1L90.3,112.6L85.6,112.6C85.1,112.6 84.5,113 84.5,113.7C84.5,114.2 85,114.8 85.6,114.8L88.1,114.8L80.6,126.9L79,126.9C78.5,126.9 77.9,127.4 77.9,128C77.9,128.6 78.4,129.1 79,129.1L95,129.1C95.5,129.1 96.1,128.7 96.1,128C96.1,127.5 95.6,126.9 95,126.9L93.2,126.9C93.6,122.8 96.6,120.8 99.4,120.8C102.2,120.8 105.1,122.7 105.5,126.9L104,126.9C103.5,126.9 102.9,127.4 102.9,128C102.9,128.6 103.4,129.1 104,129.1L120,129.1C120.6,129.1 121.1,128.7 121.1,128C120.8,127.5 120.4,127 119.7,127Z" style="fill:white;fill-rule:nonzero;"/>
                                </g>
                            </svg>
                <span class="em22">Paris</span>
              </div>
            </h2>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 ">
          <div class="wrap">
            <h2>
              <div class="bold">Plus de</div>
              <div class="em65 white"><?php the_field('nombre_de_jours_prestes');?></div>
              <div class="bold">jours prestées</div>
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-10 col-xs-push-1 col-sm-10 col-sm-push-1">
			<?php the_field('contenu');?>
        </div>
      </div>
    </section>

    <div class="bg-qsn">
      <section class="container collab">
        <div class="row">
          <div class="col-xs-12 rect-title-wrapper">
            <h1 class="rect-title"><span class="rect1"><?php the_field('nombre_de_collaborateurs');?> collaborateurs</span><span class="rect2"><?php the_field('nombre_dexpertises');?> expertises</span>
            </h1>
          </div>
          <div class="col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-2">
            <h3><?php the_field('texte_footer');?></h3>
          </div>
        </div>
      </section>
      <section class="container bg-wt bg-wt-b-mb15 team">
        <s class="a transp "></s><s class="b transp"></s>
        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-push-1">
            <a href="<?php echo esc_url( get_permalink(get_page_by_path( 'clients' )) ); ?>" class="cta yellow">Voir nos clients</a>
          </div>
        </div>
      </section>
    </div>

  </div>
 
<?php endwhile;?>

<?php get_footer(); ?>
		  
	
  


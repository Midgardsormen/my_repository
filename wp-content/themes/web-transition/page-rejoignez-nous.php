<?php

/*
Template Name: Page Notre méthode
*/
get_header(); 
?>

<!-- .notre-methode -->
  <?php
  while ( have_posts() ) : the_post();    
    ?>

  <!-- .recrutement -->
  <div id="content" class="page page-rejoignez-nous">
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
              <h2><span>Rejoignez-nous</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="t3Outer">
   
   <?php the_field('texte_dintro_page_recrutement'); ?>
    <span class="line"></span>
  </div>
 
            <?php
    the_content();
    ?>
     <p style="text-align: center;">Afin d'optimiser votre temps, nous vous proposons de cliquer sur le niveau d'expérience professionnelle qui correspond au vôtre.<br/> 
Deux avantages; pour vous: bien cibler votre candidature et pour nous: être pertinents dans notre appréciation</p>
<?php endwhile;?>
<?php the_field('texte_dintro_du_pre-filtre_profil_du_poste', 397); ?>
<section class="listing_offres pageRecru">
  <div class="searchBarSection"><?php the_field('presentation_du_cabinet'); ?></div>
<div class="filtreNiveau1 listDataRecrutementContainer">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>/postes/profilposte/jeune-diplome/">
   <span> J’ai une expérience professionnelles inférieure ou égale à 1 an ou essentiellement acquise en alternance<br/>(je suis jeune diplômé-e)</span>
</a>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>/postes/profilposte/experience-1-a-3-ans/"><span>J’ai 1 à 3 ans d’expérience professionnelle </span>
</a>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>/postes/profilposte/experience-3-a-5-ans/"><span>J’ai 3 à 5 ans d’expérience professionnelle</span>
</a>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>/postes/profilposte/experience-5-ans-et-plus/"><span>J’ai plus de 5 ans d’expérience professionnelle</span>
</a>
</div>

</section>
 <section class="container">
<div class="col-xs-12 col-sm-10 col-sm-push-1">
  <p class="buttonForm" style="width:100%;text-align: center;"><button>J'envoie ma candidature</button></p>
 <div class="formulaireCandidature">
 <?php echo do_shortcode( '[contact-form-7 id="420" title="Candidature spontanée"]' ); ?>
 </div>
 </div>
</section>

<?php get_footer(); ?>
      
  
  


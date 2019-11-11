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
  <div id="content" class="page page-recrutement-2">
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
              <h2><span>Recrutement</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="t3Outer">
      <div class="tIntro">
        
        Une question ou juste pour dire bonjour, laissez nous votre message !
      </div>
      <!--INTROLINKS-->
    
    
      <div class="tItemContainer">
        <div class="tSubHeader">Pour accompagner son développement rapide,</div>
        <div class="tText">Web Transition cherche sans cesse de nouveaux talents</div>
        <!--LINKS-->
      </div>
    
    <span class="line"></span>
  </div>
 
            <?php
    the_content();
    ?>
    
<?php endwhile;?>

<?php get_footer(); ?>
      
  
  


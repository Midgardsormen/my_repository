<?php
/**
 * The template part for displaying single posts
 *
 */

?>



    <section class="container post" id="post-<?php the_ID(); ?>">
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-push-1">
        	
			    <div class="job-detail">        
			        <h1 id="nomPoste"><span class="job-title"> <?php the_title();?></span></h1>            
			    
			<p class="buttonForm buttonFormTop"><button>Postuler en ligne</button></p>
		  
		  <p>Métier : <strong id="categoryPoste"><?php the_terms( $post->ID, 'typeposte'); ?></strong></p>
		  <p>Localisation : <strong id="localisationposte"><?php the_terms( $post->ID, 'lieuposte'); ?></strong></p>
		  <?php the_content(); ?>
		  </div>
		  <div class="jobFeatures">
		<div class="job-features">
			<div class="borderJobFeatures">
		            <h3> Autres <br> détails </h3>
		        
		    <?php the_field('autres_details'); ?>
			</div>
		</div>
		<div class="job-features">
			<div class="borderJobFeatures">
		            <h3> Conseils pour <br> postuler</h3>
		        
		    <?php the_field('conseils_pour_postuler'); ?>
			</div>
		</div>
	</div>
	<div class="retourBouton">
						<p><a href="<?php echo esc_url( get_permalink(get_page_by_path( 'rejoignez-nous' )) ); ?>" class="back">Retour à la liste des offres</a></p>
					  </div>
					  <p class="buttonForm"><button>Postuler en ligne</button></p>
<div class="formulaireCandidature">
<?php echo do_shortcode( '[contact-form-7 id="393" title="Formulaire de candidature"]' ); ?>
</div>
        </div>
      </div>

    </section>
	
    


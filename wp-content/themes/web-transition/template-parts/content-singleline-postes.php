<?php
/**
 * The template part for displaying single posts
 *
 */

?>





		  <a class="listDataRecrutement" href="<?php the_permalink(); ?>">
                  	<span class="titrePlusExtrait">
						<span class="titreOffreListing"><?php the_title(); ?></span>
						<span class="excerptOffreListing">
							      <?php  echo(the_excerpt_max_charlength(100));  ?>
						</span>
					</span>	
						<span class="lieuPoste">

							      <?php  echo strip_tags(get_the_term_list( $post->ID, 'lieuposte', '', ', ' )); ?>
							      
						</span>
					</a>

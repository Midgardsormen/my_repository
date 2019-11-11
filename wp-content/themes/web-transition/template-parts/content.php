<?php
/**
 * The template part for displaying content
 *
 */
?>

	<div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              
			  <?php the_title( '<h2><span>', '</span></h2>' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<section class="container bg-wt posts">
      <s class="a transp"></s><s class="b"></s>
      <div class="row">
        <div class="col-xs-12">
		<?php
		the_content();
		?>
		</div>
	  </div>
	</section>

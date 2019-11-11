<?php
/**
 * The template used for displaying page content

 
 */
?>	  
	<div class="entete">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="main-title icon-title">
              <i class="icon icon-actualites">
                <i class="icon path1"></i>
                <i class="icon path2"></i>
                <i class="icon path3"></i>
              </i>
			  <?php the_title( '<h2><span>', '</span></h2>' ); ?>
	
              <!--<h2><span>Actualités</span></h2>-->
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

	
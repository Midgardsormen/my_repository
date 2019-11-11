<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<!-- .etude-perso -->
  <div id="content" class=" page page-not-found">
    <div class="container">
      <div class="row">
        <div class="col-xs-4">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Oops! Cette page est inexistante...</h1>
				</header><!-- .page-header -->

				<div class="page-content" style="height:300px;">
					<a href="/" class="cta">Retour à l'accueil</a>

					<?php /*get_search_form();*/ ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
		</div>
	</div>
</div>
		
		
<?php get_footer(); ?>

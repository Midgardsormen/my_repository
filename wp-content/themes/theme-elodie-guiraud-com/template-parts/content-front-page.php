<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Thème_elodie-guiraud.com
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<?php theme_elodie_guiraud_com_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->
</section><!-- #post-<?php the_ID(); ?> -->

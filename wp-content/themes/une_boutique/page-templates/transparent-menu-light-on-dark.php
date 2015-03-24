<?php
/**
 * Template Name: Transparent Menu - Light on Dark
 *
 * Description: This is where you can start, as a home page with a transparent menu
 *
 * @package WordPress
 * @subpackage Une_Boutique
 * @since Une Boutique 2.2
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content-home', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->

<!-- Bottom Widgets -->

<?php get_footer(); ?>
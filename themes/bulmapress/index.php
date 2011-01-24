<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); ?>

<?php get_sidebar(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php get_template_part( 'loop', 'index' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
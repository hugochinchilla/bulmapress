<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<h2 class="widget-title"><?php _e( 'Buscar', 'toolbox' ); ?></h2>
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h2 class="widget-title"><?php _e( 'Archives', 'toolbox' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h2 class="widget-title"><?php _e( 'Meta', 'toolbox' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
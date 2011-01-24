<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>
		<div id="left-sidebar" class="widget-area" role="complementary">
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

		<div id="right-sidebar" class="widget-area" role="complementary">
			<aside id="thanks" class="widget">
				<h2 class="widget-title"><?php _e( 'Gracias', 'bulmapress' ); ?></h2>
				<img width="60" height="34" border="0" alt="Distribuciones Universal" src="http://bulma.net/images/universal_tiny.png"><br />
				Por el <a href="http://bulma.net/body.phtml?nIdNoticia=1134">Servidor</a><br />
				<a href="http://dmi.uib.es/">Dpto. de Matematicas e Informatica</a>
			</aside>
			
			<aside id="categories" class="widget">
				<h2 class="widget-title"><?php _e( 'Categorías', 'toolbox' ); ?></h2>
				<ul>
					<?php wp_list_categories( array('title_li' => null) ); ?>
				</ul>
			</aside>
			
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->

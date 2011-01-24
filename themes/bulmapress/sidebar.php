<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>
		<div id="left-sidebar" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="pages" class="widget widget_search">
					<h2 class="widget-title"><?php _e( 'Contenidos', 'bulmapress' ); ?></h2>
					<ul>
						<li><a href="http://bulma.net/wiki/doku.php?id=jornades:index">Jornadas de software libre</a></li>
						<li><a href="http://breu.bulma.net/">Enlaces breves</a></li>
						<li><a href="body.phtml?nIdNoticia=1968">La asociacion</a></li>
						<li><a href="masleidos.phtml">Los mas leidos</a></li>
						<li><a href="curiosidades.phtml?nTodos=1">Autores</a> [<a href="actividad.phtml">Actividad</a>]</li>
						<li><a href="comentarios.phtml">Ultimos Comentarios</a></li>
						<li><a href="todos.phtml">Todos los titulares</a></li>
						<li><a href="stats/">Estadisticas</a></li>
						<li><a href="body.phtml?nIdNoticia=720">Guia de estilo</a></li>
						<li><a href="mailto:info@bulma.net?subject=Suggeriment%20Bulma">¿Sugerencias?</a></li>
						<li><a href="http://bulma.net/wiki/"><strong>Wiki</strong></a></li>
					</ul>
				</aside>

				<aside id="mailing-lists" class="widget widget_search">
					<h2 class="widget-title">
						<a href="http://llistes.bulma.net/mailman/listinfo/"><?php _e( 'Listas de correo', 'bulmapress' ); ?></a>
					</h2>
					<ul>
						<li><a href="http://llistes.bulma.net/pipermail/bulmailing/">Archivos bulmailing</a></li>
						<li><a href="http://llistes.bulma.net/pipermail/bulmages/">Archivos BulmaGes</a></li>
					</ul>
				</aside>
				
				<aside id="radio" class="widget widget_search">
					<h2 class="widget-title"><?php _e( 'Radio libre', 'bulmapress' ); ?></h2>
					<ul>
						<li><a href="http://desdelaxarxa.net/">Des de la Xarxa</a></li>
						<li><a href="http://www.onamallorca.net/programs.php?id=53">Mallorca en  Xarxa</a></li>
					</ul>
				</aside>

				<aside id="search" class="widget widget_search">
					<h2 class="widget-title"><?php _e( 'Buscar', 'toolbox' ); ?></h2>
					<?php get_search_form(); ?>
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

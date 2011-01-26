<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_directory' ); ?>/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a href="http://github.com/hugochinchilla/bulmapress"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://assets2.github.com/img/abad93f42020b733148435e2cd92ce15c542d320?repo=&url=http%3A%2F%2Fs3.amazonaws.com%2Fgithub%2Fribbons%2Fforkme_right_green_007200.png&path=" alt="Fork me on GitHub"></a>

<div id="page" class="hfeed">
	<header id="branding">
			<hgroup role="banner">
				<div id="header-content">
					<h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
					<a href="http://bulma.net/body.phtml?nIdNoticia=2316" title="Bulma amb el projecte Defective by Desing">
						<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/DBD_banner_cat.png" alt="Bulma amb el projecta Defective by Desing" id="deffective">
					</a>
				</div>
				<h2 id="site-description">
					<a href="http://bulma.net/images/bergants.png"><span>B</span>ergantells</a> <span>U</span>suaris de GNU/<span>L</span>inux de <span>M</span>allorca i <span>A</span>fegitons |
					<span>B</span>isoños <span>U</span>suarios de GNU/<span>L</span>inux de <span>M</span>allorca y <span>A</span>lrededores
				</h2>
			</hgroup>

			<nav id="access" role="navigation">
				<h1 class="section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
	</header><!-- #branding -->


	<div id="main">
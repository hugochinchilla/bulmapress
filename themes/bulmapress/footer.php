<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
	$info= posix_uname();
	//$times = posix_times();
	//$rebooted = time()-$times["ticks"]/100;
	$uptime = exec('cat /proc/uptime');
	$uptime = explode(' ', $uptime);
	$rebooted = time() - intval($uptime);
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
				<?php _e('Kernel:', 'bulmapress') ?> <?php echo $info['sysname'].' - '.$info['machine'].' - '.$info['release'] ?> |
				<?php _e('Last boot:', 'bulmapress') ?> <?php echo date('d/m/Y H:i', $rebooted) ?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
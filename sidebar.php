<?php
/**
 * sidebar.php - Primary Sidebar
 *
 * @package REPLACE_ME Theme
 **/
?>
<section id="sidebar" class="">

	<?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>
	<aside class="widget">
		<h4 class="widget-title">Widget Block One</h4>
		<p>Please make sure to set your widgets in the appearance menu.</p>
	</aside>
	<?php endif; ?>

</section>
<?php
/**
 * pagination.php
 * 
 * Displays pagination for an archive or index page
 *
 * @package REPLACE_ME Theme
 */ 

global $wp_query;
$big = 999999999; // need an unlikely integer

?>
<div class="pagination">
<?php

echo paginate_links( array(

	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages

) );

?>
</div>
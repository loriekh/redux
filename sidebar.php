<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package redux
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

 <aside class="mu-sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

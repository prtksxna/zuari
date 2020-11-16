<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zuari
 */
?>

<?php if ( !empty(get_post_meta(get_the_ID(), 'fg_color', true))) { ?>
	<style media="screen">
	:root {
		--fg-color: <?php echo get_post_meta(get_the_ID(), 'fg_color', true); ?> !important;
	}
	</style>
<?php }?>

<?php if ( !empty(get_post_meta(get_the_ID(), 'fg_color', true))) { ?>
	<style media="screen">
	:root {
		--bg-color: <?php echo get_post_meta(get_the_ID(), 'bg_color', true); ?> !important;
	}
	body.custom-background {
		background-color: <?php echo get_post_meta(get_the_ID(), 'bg_color', true); ?>;
	}
	</style>
<?php }?>

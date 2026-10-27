<?php
/**
 * The template for displaying all pages
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="container page-content-wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose-content' ); ?>>
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</article>
</div>

<?php
get_footer();

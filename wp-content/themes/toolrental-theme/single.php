<?php
/**
 * The template for displaying single posts
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
		<div style="font-size: 14px; color: #94a3b8; margin-top: 8px;">
			<?php echo esc_html( get_the_date() ); ?> | <?php the_author(); ?>
		</div>
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

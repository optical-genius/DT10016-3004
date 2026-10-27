<?php
/**
 * The main template file
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
		<h1><?php bloginfo( 'name' ); ?></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div>
</div>

<div class="container page-content-wrapper">
	<div class="prose-content">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #e2e8f0;">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div style="font-size: 14px; color: #64748b; margin-bottom: 12px;"><?php echo esc_html( get_the_date() ); ?></div>
					<div><?php the_excerpt(); ?></div>
				</article>
				<?php
			endwhile;
			the_posts_navigation();
		else :
			echo '<p>' . esc_html__( 'Ei sisältöä näytettäväksi.', 'toolrental' ) . '</p>';
		endif;
		?>
	</div>
</div>

<?php
get_footer();

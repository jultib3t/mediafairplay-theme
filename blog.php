<?php
/**
 * Template Name: Blog
 * The front page tempalte should be home
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mfp
 */

get_header();
?>

	<main id="primary" class="site-main">
    <?php
    // if enable breadcrumbs - default is 0 ( no )
    if (function_exists('yoast_breadcrumb')) {
        if (get_theme_mod('mfp_enable_breadcrumbs')) {
            if (function_exists('yoast_breadcrumb')) { ?>
                <div class="breadcrums-wrapper">
                    <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
        <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

            /* Start the Loop */
            // test for comment
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

        endif;

        $post = get_post();
        $blocks = parse_blocks( $post->post_content ); 
     /*    echo '<pre>';
        var_dump($blocks);
        echo '</pre>'; */

if ( has_blocks( $post->post_content ) ) {
    $blocks = parse_blocks( $post->post_content );

    if ( $blocks[0]['blockName'] === 'core/latest-posts' ) {
        echo 'lastest post exist';
    }
}

		?>

	</main><!-- #main -->

<?php
    /** Disable The sidebar */
    get_sidebar();
get_footer();

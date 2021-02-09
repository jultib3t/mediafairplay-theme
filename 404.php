<?php
/**
 * Template Name: 404
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mediafairplay
 */

get_header();
?>

	<main id="primary" class="site-main" style="max-width: 1440px; width: 100%; margin:0 auto;">

		<section class="error-404 not-found">
			
			<img src="https://media.giphy.com/media/14uQ3cOFteDaU/source.gif"/>
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mediafairplay' ); ?></p>

					<?php
					// get_search_form();

					// the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<!-- <div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'mediafairplay' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div> --><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					// $mediafairplay_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'mediafairplay' ), convert_smilies( ':)' ) ) . '</p>';
					// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$mediafairplay_archive_content" );

					// the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

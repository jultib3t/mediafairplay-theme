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

<style>
	div#page {
		background-image: url('<?php echo get_theme_mod('mfp_404_page_choose_img');?>');
		background-size: cover;
		padding-top: 100px;
	}

	.page-content-wrapper {
		margin-top: 10em;
		margin-bottom: 4em;
		padding: 3em;
		background: rgba(196, 196, 196, 0.5);
		border: 4px solid #868686;
		box-sizing: border-box;
		backdrop-filter: blur(30px);
		/* Note: backdrop-filter has minimal browser support */
		border-radius: 10px;
		max-width: 946px;
		margin-right: auto;
		margin-left: auto;
	}

	.page-content-wrapper {
		margin-top: 0;
	}

	.button_wrapper a {
		background: <?php echo get_theme_mod('header_background_color', '#E66D6D'); ?>;
		border-radius: 10px;
		color: #fff;
		text-decoration: none;
		padding: 15px;
		font-size: 20px;
	}

	.button_wrapper button {
		background: <?php echo get_theme_mod('header_background_color', '#E66D6D'); ?>;
		border-radius: 10px;
		color: #fff;
		text-decoration: none;
		padding: 15px;
		font-size: 20px;
	}

	.button_wrapper {
		width: 100%;
		display: flex;
		justify-content: space-evenly;
		margin-top: 4em;
	}
	._404_title{
		font-size: 200px;color: #425B9C;
	}
	._404_subtext_{
		color: #425B9C;
		font-size: 35px;
		font-weight: bold;
	}
	@media(max-width: 550px){
		._404_title{
		font-size: 70px;color: #425B9C;
	}
	._404_subtext_{
		color: #425B9C;
		font-size: 21px;
		font-weight: bold;
	}
	}
</style>
<main id="primary" class="site-main" style="margin-right: auto;margin-left: auto;max-width: 1440px; width: 100%;text-align:center;padding-top: 30px;background-color: transparent;padding-bottom:70px;">
	
	<section class="error-404 not-found">
		<div class="page-content-wrapper">
			<div class="_404_title" >404</div>
			<div class="_404_subtext_" style=""><?php esc_html_e('The Page You Are Looking For Can Not Be Found'); ?></div>
			<div class="button_wrapper">
				<a href="<?php echo home_url(); ?>">Home Page</a>
				<button onclick="goBack()">Go Back</button>
				<script>
					function goBack() {
						window.history.back();
					}
				</script>
			</div>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_sidebar();
get_footer();

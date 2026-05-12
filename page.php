<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package halepath_theme
 */

get_header();
?>
<main class="">
	<section
		class="py-16 sm:h-[350px] h-[260px] flex items-center justify-center bg-cover bg-no-repeat bg-center bg-black/50 bg-blend-overlay"
		style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/about-page/s2.webp'; ?>')">
		<div class="hale_container">
			<h1 class="text-white font-bold text-3xl md:text-5xl lg:text-[51px]">
				<?php the_title(); ?>
			</h1>
		</div>
	</section>
	<section class="py-16">
		<div class="hale_container page_content">
			<?php
			the_content();
			?>
		</div>
	</section>
</main>
<?php

get_footer();
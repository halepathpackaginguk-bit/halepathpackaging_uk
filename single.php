<?php
get_header();
?>
<main>
	<?php while (have_posts()):
		the_post(); ?>

		<!-- Hero Section -->
		<section class="pt-14">
			<div class="container mx-auto px-4">

				<!-- Title -->
				<h1 class="md:text-[51px] md:leading-normal text-3xl font-bold text-title_Clr text-center mb-4">
					<?php the_title(); ?>
				</h1>

				<!-- Featured Image -->
				<div class="max-w-[1054px] max-h-[454px] h-full mx-auto">
					<?php if (has_post_thumbnail()): ?>
						<?php the_post_thumbnail('full', [
							'class' => 'object-cover object-center rounded-[19px] mx-auto w-full h-full'
						]); ?>
					<?php endif; ?>
				</div>

			</div>
		</section>

		<!-- Content Section -->
		<section class="pt-6 pb-14">
			<div class="container mx-auto px-4">
				<div class="desc_content my-4">
					<?php the_content(); ?>
				</div>
			</div>
		</section>

	<?php endwhile; ?>

	<!-- Most Popular Blog Section -->
	<section class="pb-14">
		<div class="container mx-auto px-4">

			<h2 class="md:text-[29px] md:leading-normal text-lg font-bold text-title_Clr text-center mb-4">
				Most Popular Blog
			</h2>

			<div class="grid md:grid-cols-3 grid-cols-1 md:gap-[30px] gap-7">

				<?php
				$popular_posts = new WP_Query([
					'post_type' => 'post',
					'posts_per_page' => 3,
					'post__not_in' => [get_the_ID()],
					'orderby' => 'date'
				]);

				if ($popular_posts->have_posts()):
					while ($popular_posts->have_posts()):
						$popular_posts->the_post();
						?>

						<div class="shadow-[-1px_3px_10px_0px_rgba(0,0,0,0.06)] border border-[#E5E5E5]">

							<!-- Image -->
							<div class="h-[264px]">
								<a href="<?php the_permalink(); ?>">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('medium_large', [
											'class' => 'w-full h-full object-cover object-center'
										]); ?>
									<?php else: ?>
										<img src="https://via.placeholder.com/480x264" alt="<?php the_title(); ?>"
											class="w-full h-full object-cover object-center">
									<?php endif; ?>
								</a>
							</div>

							<!-- Content -->
							<div class="md:p-7 p-5">

								<!-- Category -->
								<p class="text-sm font-semibold text-secondary/80 bg-[#F1F5F9] px-2 py-1 rounded-lg w-fit">
									<?php
									$categories = get_the_category();
									if (!empty($categories)) {
										echo esc_html($categories[0]->name);
									}
									?>
								</p>

								<!-- Title -->
								<h4>
									<a href="<?php the_permalink(); ?>"
										class="md:text-xl text-lg font-bold text-black inline-flex my-5">
										<?php the_title(); ?>
									</a>
								</h4>

								<!-- Read More -->
								<p>
									<a href="<?php the_permalink(); ?>"
										class="text-base font-normal text-secondary inline-flex items-center gap-3">
										Read More
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em"
											fill="currentColor">
											<path
												d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z">
											</path>
										</svg>
									</a>
								</p>

							</div>

						</div>

						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>

			</div>

		</div>
	</section>
</main>

<?php
get_footer();
?>
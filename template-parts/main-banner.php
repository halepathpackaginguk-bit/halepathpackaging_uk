<?php
$home = get_field('banner_slider');
$title = $home['title'] ?? '';
$desc = $home['desc'] ?? '';
$btn_link = $home['btnlink'] ?? '';
?>

<section class="Main_slider">
    <div class="main-slider">
        <div class="video-container">
            <video autoplay muted loop playsinline>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/video-new.mp4" type="video/mp4">
            </video>

            <div class="video_overlay">
                <div class="hale_container relative z-10">
                    <div class="md:w-1/2 w-full">
                        <h1 class="h1">
                            <?php echo esc_html($title); ?>
                        </h1>

                        <p class="text-white sm:text-2xl text-lg font-medium mb-8">
                            <?php echo esc_html($desc); ?>
                        </p>

                        <a href="<?php echo esc_url($btn_link); ?>" class="btn_primary">
                            Enquire Now <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$home = get_field('banner_slider');
$title = $home['title'] ?? '';
$desc = $home['desc'] ?? '';
$btn_link = $home['btnlink'] ?? '';
?>

<section class="Main_slider">
    <div class="main-slider">
        <div class="w-full relative 2xl:h-[705px] md:h-[605px] overflow-hidden">
    <iframe
        class="absolute top-1/2 left-1/2 sm:w-[120vw] sm:h-[120vh] w-[210vw] h-[210vh] -translate-x-1/2 -translate-y-1/2"
        src="https://www.youtube.com/embed/dfViGz8LoZE?autoplay=1&mute=1&controls=0&loop=1"
       allow="autoplay; fullscreen"
        frameborder="0">
    </iframe>
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
<?php
$home = get_field('banner_slider');
$title = $home['title'] ?? '';
$desc = $home['desc'] ?? '';
$btn_link = $home['btnlink'] ?? '';
$video_id = 'dfViGz8LoZE';
?>

<section class="Main_slider">
    <div class="main-slider">
        <div class="w-full relative 2xl:h-[705px] md:h-[605px] overflow-hidden bg-[#10151d]">
            <div class="yt-facade absolute inset-0 cursor-pointer" role="button" tabindex="0"
                data-video-id="<?php echo esc_attr($video_id); ?>"
                aria-label="<?php echo esc_attr__('Play background video', 'halepath_theme'); ?>">
                <img src="https://i.ytimg.com/vi/<?php echo esc_attr($video_id); ?>/maxresdefault.jpg"
                    onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/<?php echo esc_attr($video_id); ?>/hqdefault.jpg';"
                    alt="" class="w-full h-full object-cover" fetchpriority="high">
                <span class="yt-play-btn" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M8 5v14l11-7z" /></svg>
                </span>
            </div>
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
                            Explore Packaging <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$services_sec = get_field('home_services');
$title = $services_sec['title'] ?? '';
$subtitle = $services_sec['subtitle'] ?? '';
$services = $services_sec['service'] ?? [];
?>

<section class="pt-[60px] bg-[#F5F5F5]">
    <div class="hale_container flex flex-col justify-center items-center">
        <h6 class="text-[#1C2E42] font-semibold flex gap-2 items-center">
            <?php echo $subtitle; ?>
            <div class="sub_title_line"></div>
        </h6>
        <h2 class="h2">
            <?php echo $title; ?>
        </h2>
    </div>
    <div class="offerbg bg-cover bg-no-repeat sm:mt-44 mt-32 border"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-page/offer-bg.png'">
        <div class="hale_container ">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4 sm:mb-32 mb-10 sm:-mt-48 -mt-36">

                <?php if ($services): ?>
                    <?php foreach ($services as $service):
                        $service_title = $service['title'] ?? '';
                        $service_content = $service['content'] ?? '';
                        $service_image = $service['image'] ?? '';
                        ?>

                        <div class="service_box ms:h-[520px] h-[380px] sm:p-5 p-2 bg-white/5 backdrop-blur-[10px]">
                            <div class="h-full w-full bg-no-repeat bg-center bg-cover flex items-end justify-end pt-6 pb-1"
                                style="background-image:url('<?php echo esc_url($service_image); ?>')">

                                <div class="service_inner">
                                    <div class="content">

                                        <h5 class="group">
                                            <?php echo esc_html($service_title); ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-page/li_move-up-right.svg"
                                                class="group-hover:scale-110 transition-all duration-300" width="24"
                                                height="24">
                                        </h5>

                                        <p class="mt-3 text-white sm:text-sm text-xs">
                                            <?php echo esc_html($service_content); ?>
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
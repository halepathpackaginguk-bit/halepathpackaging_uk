<?php
$WeDo_sec = get_field('work_we_do');

$title = $WeDo_sec['title'] ?? '';
$subtitle = $WeDo_sec['subtitle'] ?? '';
$services = $WeDo_sec['service'] ?? [];
?>

<section class="py-16">
    <div class="hale_container">
        <h2 class="h2 md:mb-5!">
            <?php echo esc_html($title); ?>
        </h2>

        <p class="md:text-xl text-base font-normal text-title_Clr text-center max-w-[880px] mx-auto">
            <?php echo esc_html($subtitle); ?>
        </p>

        <a href="<?php echo site_url('/products'); ?>" class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
            See All Products
        </a>
    </div>

    <div class="hale_container flex md:flex-row flex-col lg:gap-40 gap-7 mt-10">

        <div class="md:w-1/2 w-full flex md:flex-row flex-col items-start gap-7 [&>*:nth-child(1)]:md:-mt-40">
            <?php foreach (array_slice($services, 0, 2) as $product):
                $title = $product['title'] ?? '';
                $content = $product['content'] ?? '';
                $link = $product['servicelink'] ?? '#';
                $image = $product['image'] ?? '';
                ?>
                <div class="feature_box">
                    <div>
                        <a href="<?php echo esc_url($link); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="" class="img-full sm:h-auto! h-[240px]!" width="292"
                                height="226">
                        </a>
                    </div>

                    <div class="p-5">
                        <h3>
                            <a href="<?php echo esc_url($link); ?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        </h3>

                        <p class="md:text-xl text-lg font-normal text-title_Clr">
                            <?php echo esc_html($content); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="md:w-1/2 w-full flex md:flex-row flex-col items-start gap-7 [&>*:nth-child(2)]:md:-mt-40">
            <?php foreach (array_slice($services, 2, 2) as $product):
                $title = $product['title'] ?? '';
                $content = $product['content'] ?? '';
                $link = $product['servicelink'] ?? '#';
                $image = $product['image'] ?? '';
                ?>
                <div class="feature_box">
                    <div>
                        <a href="<?php echo esc_url($link); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="" class="img-full sm:h-auto! h-[240px]!" width="292"
                                height="226">
                        </a>
                    </div>

                    <div class="p-5">
                        <h3>
                            <a href="<?php echo esc_url($link); ?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        </h3>

                        <p class="md:text-xl text-lg font-normal text-title_Clr">
                            <?php echo esc_html($content); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
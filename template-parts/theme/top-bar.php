<?php
$marquee_items = [
    'Free expert design support',
    'Free UK delivery',
    'Minimum 100-Unit MOQ',
    '10% Bulk Order Savings',
    'Logo printing in CMYK or PMS colours for packaging',
    'Foil, embossing, and window cut options',
];
?>

<!-- Top Bar -->
<div class="bg-secondary py-2.5 hidden md:block">
    <div class="hale_container flex items-center justify-between">
        <ul class="flex items-center divide-x-2 divide-white">
            <li>
                <a href="tel:+4401213186768" class="top_links">
                    <i class="fas fa-phone-alt" aria-hidden="true"></i>
                    01213186768
                </a>
            </li>
            <li>
                <a href="mailto:sales@halepathpackaging.co.uk" class="top_links">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    sales@halepathpackaging.co.uk
                </a>
            </li>
        </ul>
        <!-- Top Announcement Marquee -->
        <div class="md:w-1/2 md:mx-auto w-full overflow-hidden text-white">
            <div
                class="marquee-track flex w-max items-center motion-safe:animate-marquee hover:[animation-play-state:paused]">

                <?php for ($copy = 0; $copy < 2; $copy++): ?>
                    <div
                        class="marquee-group flex shrink-0 items-center gap-8 py-3 pr-8 text-sm font-medium tracking-wide sm:gap-12">

                        <?php foreach ($marquee_items as $item): ?>
                            <div class="flex shrink-0 items-center gap-3 whitespace-nowrap">
                                <span class="text-white" aria-hidden="true">|</span>
                                <span><?php echo esc_html($item); ?></span>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endfor; ?>

            </div>
        </div>
        <ul class="flex items-center divide-x-2 divide-white">
            <li>
                <a href="<?php echo esc_url(home_url('/products/')); ?>" class="top_links">All Products</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="top_links">Blog</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="top_links">About Us</a>
            </li>
        </ul>
    </div>
</div>

<div class="bg-white py-1.5 hidden lg:block">
    <div class="hale_container flex items-center justify-between">
        <!-- Logo -->
        <div class="lg:block hidden sm:w-[25%] w-1/2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                    alt="Hale Path Packaging Logo" height="90" width="90" class="h-full w-full" />
            </a>
        </div>

        <!-- Live search -->
        <div class="lg:block hidden w-1/2">
            <div class="relative w-full">
                <input type="text" id="live-search" placeholder="Search products..." autocomplete="off"
                    class="text-sm md:leading-[40px] font-normal text-[#7C7C7C] placeholder:text-[#7C7C7C] bg-white px-7  border border-secondary focus:border-primary outline-none rounded-full w-full" />

                <div id="live-search-results" class="absolute z-60 w-full mt-1 bg-white rounded-lg shadow-lg hidden">
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="xl:w-1/4 sm:w-1/3 hidden lg:flex gap-5 justify-end">
            <a href="https://wa.me/447893945259" target="_blank" rel="noopener noreferrer"
                class="border-2 border-secondary px-5 py-2 text-[13px] uppercase font-medium text-secondary rounded-full hover:bg-secondary hover:text-white">
                <i class="fab fa-whatsapp mr-1.5" aria-hidden="true"></i> WhatsApp
            </a>
            <a href="<?php echo esc_url(home_url('/get-quote-now')); ?>"
                class="border-2 border-secondary bg-secondary px-5 py-2 text-[13px] uppercase font-medium text-white rounded-full hover:bg-transparent hover:text-secondary">
                Get Quote Now
            </a>
        </div>
    </div>
</div>
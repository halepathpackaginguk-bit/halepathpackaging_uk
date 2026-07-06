<!-- Top Bar -->
<div class="bg-secondary py-2.5 hidden md:block">
    <div class="hale_container flex items-center justify-between">
        <ul class="flex items-center divide-x-2 divide-white">
            <li>
                <a href="tel:+4401213186768" class="top_links">
                    <i class="fas fa-phone-alt"></i>
                    01213186768
                </a>
            </li>
            <li>
                <a href="mailto:sales@halepathpackaging.co.uk" class="top_links">
                    <i class="fas fa-envelope"></i>
                    sales@halepathpackaging.co.uk
                </a>
            </li>
        </ul>
        <ul class="flex items-center divide-x-2 divide-white">
            <li>
                <a href="https://halepathpackaging.co.uk/products/" class="top_links">

                    All Products
                </a>
            </li>
            <li>
                <a href="https://halepathpackaging.co.uk/blog/" class="top_links">

                    Blog
                </a>
            </li>
            <li>
                <a href="https://halepathpackaging.co.uk/about-us/" class="top_links">

                    About Us
                </a>
            </li>
            <li class="px-2">
                <?php echo do_shortcode('[gtranslate]'); ?>
            </li>
        </ul>
    </div>
</div>
<div class="bg-white py-1.5 hidden lg:block">
    <div class="hale_container flex items-center justify-between">
        <!-- Logo -->
        <div class="lg:block hidden sm:w-[25%] w-1/2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                    alt="Hale Path Packaging Logo" height="90" width="90" class="h-full w-full" />
            </a>
        </div>
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
            <a href="https://wa.me/447893945259" target="_blank"
                class="border-2 border-secondary px-5 py-2 text-[13px] uppercase font-medium text-secondary rounded-full hover:bg-secondary hover:text-white">
                <i class="fab fa-whatsapp mr-1.5"></i>WhatsApp
            </a>
            <a href="<?php echo home_url('/get-quote-now'); ?>"
                class="border-2 border-secondary bg-secondary px-5 py-2 text-[13px] uppercase font-medium text-white rounded-full hover:bg-transparent hover:text-secondary">
                Get Quote Now
            </a>
        </div>
    </div>
</div>
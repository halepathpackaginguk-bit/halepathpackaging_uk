<section class="py-6 md:px-4 px-4 bg-[#f5f5f5] ">
    <div class="hale_container flex md:flex-row flex-col gap-6">
        <div class="flex flex-wrap gap-2 items-center md:w-1/2 w-full">
            <p class="">
                Serving 5000+ Happy Customers!
            </p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust.png" alt="Trust" class="brand_img"
                width="190" height="auto" />
            <a href="#" class="text-secondary hover:text-primary text-base  flex w-fit ">

                4.9 Google Reviews
            </a>
        </div>
        <div class=" md:w-1/2 w-full brands-slider">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/6.svg" alt="brand6"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/7.svg" alt="brand7"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/8.svg" alt="brand8"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/9.svg" alt="brand9"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/10.svg" alt="brand10"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/11.svg" alt="brand11"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/12.svg" alt="brand12"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/13.svg" alt="brand13"
                class="brand_img" width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/14.svg" alt="brand14"
                class="brand_img" width="200" height="101" />
        </div>
    </div>


</section>


<script>
jQuery(document).ready(function($) {
    $('.brands-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        autoplay: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});
</script>
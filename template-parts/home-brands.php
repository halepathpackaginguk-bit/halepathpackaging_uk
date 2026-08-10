<section class="pb-12 md:px-4 px-4">
    <div class="hale_container md:p-8! p-8!">
        <h2 class="h2">
          Custom Card UK — Built for Sellers 
        </h2>
        <p class="sm:text-lg text-sm font-normal text-txt_Clr text-center md:w-5/6 mx-auto">
            Whether you're selling playing cards on Etsy, tarot decks on Shopify, or flash card sets wholesale, we manufacture the boxes too. Custom tuck boxes, rigid presentation cases, and printed card sleeves, all made to your exact size and finish. Sync your packaging with your store in a few clicks.
        </p>
        <a href="<?php echo site_url('/amazon-fulfilment-fba'); ?>"
            class="text-secondary hover:text-primary text-base font-semibold text-center underline flex w-fit mx-auto mt-5">
            Amazon Fulfillment
        </a>
        <div class="flex flex-wrap sm:gap-7 gap-5 justify-center mt-8">
           
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/6.svg" alt="brand6"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/7.svg" alt="brand7"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/8.svg" alt="brand8"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/9.svg" alt="brand9"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/10.svg" alt="brand10"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/11.svg" alt="brand11"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/12.svg" alt="brand12"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/13.svg" alt="brand13"
                class="brand_img"
                width="200" height="101" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands/14.svg" alt="brand14"
                class="brand_img"
                width="200" height="101" />
        </div>
    </div>

      <?php

      $custom_game_cards = get_field('custom_game_cards');
    get_template_part(
        'template-parts/product-slider',
        null,
        [
            'products' => $custom_game_cards,
            'slidesToShow' => 4,
            'direction' => 'ltr'
        ]
    ); ?>
    <a href="<?php echo home_url('/custom-game-cards'); ?>"
        class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
        See All Offset Printing
    </a>
</section>
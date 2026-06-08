
 <?php $product_extra_info = get_field('product_extra_info');

        $product_info_box1_title = $product_extra_info['info_box']['title'];
        $product_info_box1_description = $product_extra_info['info_box']['description'];
        $product_info_box1_image = $product_extra_info['info_box']['image'];

        $product_info_box2_title = $product_extra_info['info_box2']['title'];
        $product_info_box2_description = $product_extra_info['info_box2']['description'];
        $product_info_box2_image = $product_extra_info['info_box2']['image'];

        
        $show_hide = $product_extra_info['show_hide'];

       

 

       
       
      

       


        ?>

        <?php if ($show_hide !== 'Hide') : ?>

<section class="my-10">
    <div class="hale_container md:flex items-center gap-5 md:gap-10 flex-row-reverse">      

        <figure class="md:w-1/2">
            <img alt="Why Us Image" src="<?php echo esc_url($product_info_box1_image); ?>" height="auto" width="100%"
                class="rounded-2xl">
        </figure>
        <div class="flex md:w-1/2 justify-center md:justify-start items-center md:items-start flex-col cat_info_box">
            <h2 class="text-[#111827] mt-5 md:mt-0 font-bold text-3xl text-center md:text-left mb-4">
                <?php echo $product_info_box1_title; ?>
            </h2>
            <p class="mb-7 text-center md:text-left"><?php echo $product_info_box1_description; ?>
            </p>
            <a class="py-[9px] px-[41px] text-white bg-[#1C2E42] rounded-md" href="/get-quote-now">Get Custom Quote</a>
        </div>
    </div>
</section>

<section class="my-10">
    <div class="hale_container md:flex items-center gap-5 md:gap-10 flex-row">

        <figure class="md:w-1/2">
            <img alt="Why Us Image" src="<?php echo esc_url($product_info_box2_image); ?>" height="auto" width="100%"
                class="rounded-2xl">
        </figure>
        <div class="flex md:w-1/2 justify-center md:justify-start items-center md:items-start flex-col cat_info_box">
            <h2 class="text-[#111827] mt-5 md:mt-0 font-bold text-3xl text-center md:text-left mb-4">
                <?php echo $product_info_box2_title; ?>
            </h2>
            <p class="mb-7 text-center md:text-left"><?php echo $product_info_box2_description; ?>
            </p>
            <a class="py-[9px] px-[41px] text-white bg-[#1C2E42] rounded-md" href="/get-quote-now">Get Custom Quote</a>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_template_part('template-parts/woo/pro-reviews'); ?>

<?php get_template_part('template-parts/woo/product-faq'); ?>


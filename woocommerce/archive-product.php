<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');


$term = get_queried_object();
$category_id = get_queried_object()->term_id;
$category = get_term($category_id, 'product_cat');
$cat_info = get_field('category_info', 'product_cat_' . $category_id);
$cat_faqs = get_field('faqs_sections', 'product_cat_' . $category_id);
$product_extra_info = $cat_info;
$product_info_box1_title = $product_extra_info['info_box']['title'];
$product_info_box1_description = $product_extra_info['info_box']['description'];
$product_info_box1_image = $product_extra_info['info_box']['image'];
$product_info_box2_title = $product_extra_info['info_box2']['title'];
$product_info_box2_description = $product_extra_info['info_box2']['description'];
$product_info_box2_image = $product_extra_info['info_box2']['image'];

?>
<?php
$Cate_gallery = [
  [
    'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'alt' => 'Video 1'
  ],
  [
    'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'alt' => 'Video 2'
  ],
  [
    'url' => 'https://player.vimeo.com/video/dQw4w9WgXcQ',
    'alt' => 'Video 3'
  ],
  [
    'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'alt' => 'Video 1'
  ],
  [
    'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'alt' => 'Video 2'
  ],
  [
    'url' => 'https://player.vimeo.com/video/dQw4w9WgXcQ',
    'alt' => 'Video 3'
  ],
];
?>

<?php
// Get category image
$thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
$image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : '';

// Check if any value exists
if (!empty($image_url) || !empty($category->name) || !empty($category->description)):
  ?>
  <section class="py-10 lg:py-20">
    <div class="hale_container grid items-center md:grid-cols-2 gap-4 md:gap-8 lg:gap-10 xl:gap-[70px]">
      <div class="h-full">
        <?php if (!empty($image_url)): ?>
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>"
            class="img-full rounded-[22px]">
        <?php endif; ?>
      </div>
      <div>
        <?php if (!empty($category->name)): ?>
          <h1 class="font-bold text-3xl lg:text-5xl">
            <?php echo esc_html($category->name); ?>
          </h1>
        <?php endif; ?>

        <?php if (!empty($category->description)): ?>
          <p class="xl:text-[19px] mt-4">
            <?php echo $category->description; ?>
          </p>
        <?php endif; ?>
        <div class="mt-8">
          <?php get_template_part('template-parts/woo/product-form'); ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php
$term_id = get_queried_object_id();
if (have_rows('categories_videos', 'product_cat_' . $term_id)): ?>
  <section class="mt-20 max-w-[2200px] mx-auto px-3 lg:px-0">
    <h2 class="text-2xl text-center mb-8 sm:text-3xl md:text-5xl font-bold">
      <?php echo esc_html($category->name); ?> Gallery
    </h2>
    <div class="relative w-full py-8">
      <div class="cat_gallery">
        <?php while (have_rows('categories_videos', 'product_cat_' . $term_id)):
          the_row();
          $video_link = get_sub_field('video_link');
          if ($video_link): ?>
            <div class="px-2">
              <div class="rounded-2xl h-[450px] w-full overflow-hidden">
                <iframe src="<?php echo esc_url($video_link); ?>" class="h-full w-full rounded-2xl" frameborder="0"
                  allow="autoplay; encrypted-media" allowfullscreen loading="lazy">
                </iframe>
              </div>
            </div>
          <?php endif; endwhile; ?>
      </div>
      <div class="flex justify-center gap-4 text-3xl mt-4">
        <button class="cat-prev hover:text-[#47AFC3] cursor-pointer">&#8592;</button>
        <button class="cat-next hover:text-[#47AFC3] cursor-pointer">&#8594;</button>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- Qoute Form Start-->
<!-- <section>
  <div class="hale_container">
    <p class="font-extrabold text-4xl text-center">Get Custom Quote</p>
  </div>
  <?php //get_template_part('template-parts/woo/qoute-form'); ?>
</section> -->
<!-- Qoute Form End-->

<section class="mt-20 hale_container">
  <div>
    <h2 class="font-extrabold text-4xl text-center">Explore <?php echo esc_html($category->name); ?></h2>
  </div>
  <?php
  /**
   * Hook: woocommerce_before_main_content.
   *
   * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
   * @hooked woocommerce_breadcrumb - 20
   * @hooked WC_Structured_Data::generate_website_data() - 30
   */
  do_action('woocommerce_before_main_content');

  /**
   * Hook: woocommerce_shop_loop_header.
   *
   * @since 8.6.0
   *
   * @hooked woocommerce_product_taxonomy_archive_header - 10
   */
  do_action('woocommerce_shop_loop_header');

  if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');

    woocommerce_product_loop_start();

    if (wc_get_loop_prop('total')) {
      while (have_posts()) {
        the_post();

        /**
         * Hook: woocommerce_shop_loop.
         */
        do_action('woocommerce_shop_loop');

        wc_get_template_part('content', 'product');
      }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
  } else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action('woocommerce_no_products_found');
  }

  /**
   * Hook: woocommerce_after_main_content.
   *
   * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
   */
  do_action('woocommerce_after_main_content');

  /**
   * Hook: woocommerce_sidebar.
   *
   * @hooked woocommerce_get_sidebar - 10
   */
  //do_action('woocommerce_sidebar');
  ?>
</section>
<?php if (!empty($product_info_box1_title) || !empty($product_info_box1_description) || !empty($product_info_box1_image)): ?>
  <section class="my-20">
    <div class="hale_container md:flex items-center gap-5 md:gap-10 flex-row-reverse">

      <?php if (!empty($product_info_box1_image)): ?>
        <figure class="md:w-1/2">
          <img alt="Why Us Image" src="<?php echo esc_url($product_info_box1_image); ?>" class="rounded-2xl w-full h-auto">
        </figure>
      <?php endif; ?>

      <div class="flex md:w-1/2 justify-center md:justify-start items-center md:items-start flex-col">

        <?php if (!empty($product_info_box1_title)): ?>
          <h2 class="text-[#111827] mt-5 md:mt-0 font-bold text-3xl text-center md:text-left mb-4">
            <?php echo esc_html($product_info_box1_title); ?>
          </h2>
        <?php endif; ?>

        <?php if (!empty($product_info_box1_description)): ?>
          <p class="mb-7 text-center md:text-left">
            <?php echo ($product_info_box1_description); ?>
          </p>
        <?php endif; ?>

        <a class="py-[9px] px-[41px] text-white bg-[#1C2E42] rounded-md" href="/get-quote-now">
          Get Custom Quote
        </a>

      </div>
    </div>
  </section>
<?php endif; ?>
<?php if (!empty($product_info_box2_title) || !empty($product_info_box2_description) || !empty($product_info_box2_image)): ?>
  <section class="my-20">
    <div class="hale_container md:flex items-center gap-5 md:gap-10">
      <?php if (!empty($product_info_box2_image)): ?>
        <figure class="md:w-1/2">
          <img alt="Why Us Image" src="<?php echo esc_url($product_info_box2_image); ?>" class="rounded-2xl w-full h-auto">
        </figure>
      <?php endif; ?>
      <div class="flex md:w-1/2 justify-center md:justify-start items-center md:items-start flex-col">
        <?php if (!empty($product_info_box2_title)): ?>
          <h2 class="text-[#111827] mt-5 md:mt-0 font-bold text-3xl text-center md:text-left mb-4">
            <?php echo esc_html($product_info_box2_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($product_info_box2_description)): ?>
          <p class="mb-7 text-center md:text-left">
            <?php echo ($product_info_box2_description); ?>
          </p>
        <?php endif; ?>
        <a class="py-[9px] px-[41px] text-white bg-[#1C2E42] rounded-md" href="/get-quote-now">
          Get Custom Quote
        </a>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php if (!empty($cat_faqs)): ?>
  <?php get_template_part(
    'template-parts/woo/cat-faqs',
    null,
    array(
      'cat_faqs' => $cat_faqs
    )
  ); ?>
<?php endif; ?>
<?php get_footer('shop'); ?>
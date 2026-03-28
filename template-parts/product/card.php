<?php
$product_id = get_query_var('product_id');
$product = wc_get_product($product_id);

if (!$product) return;

$image_id  = $product->get_image_id();
$image_url = $image_id
    ? wp_get_attachment_image_url($image_id, 'large')
    : wc_placeholder_img_src();
?>

<div class="p-3">
    <a href="<?php echo get_permalink($product_id); ?>">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($product_id)); ?>"
            class="maskimage img-full">
    </a>

    <a href="<?php echo get_permalink($product_id); ?>" class="box_link">
        <?php echo get_the_title($product_id); ?>
    </a>
</div>
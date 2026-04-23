<?php
global $product;

// If no product is set, get the current product
if (!$product) {
    $product = wc_get_product(get_the_ID());
}

if (!$product) {
    return;
}

// Fetch real product reviews
$reviews = get_comments(array(
    'post_id' => $product->get_id(),
    'type' => 'review',
    'status' => 'approve',
    'orderby' => 'comment_date',
    'order' => 'DESC',
    'number' => 10 // Limit to 10 reviews
));

// Transform reviews into testimonials array
$testimonialsRes = [];

foreach ($reviews as $review) {
    $rating = get_comment_meta($review->comment_ID, 'rating', true);
    
    // Get customer location from order if available
    $customer_location = 'Customer';
    $user_id = $review->user_id;
    $customer_email = $review->comment_author_email;
    
    // Try to get location from customer's orders
    if ($user_id > 0) {
        $customer = new WC_Customer($user_id);
        $city = $customer->get_billing_city();
        $country = $customer->get_billing_country();
        
        if ($city && $country) {
            $country_name = WC()->countries->countries[$country] ?? $country;
            $customer_location = $city . ', ' . $country_name;
        } elseif ($city) {
            $customer_location = $city;
        } elseif ($country) {
            $country_name = WC()->countries->countries[$country] ?? $country;
            $customer_location = $country_name;
        }
    } 
    
    // If no location from user account, try to get from completed orders by email
    if ($customer_location === 'Customer' && $customer_email) {
        $orders = wc_get_orders(array(
            'customer' => $customer_email,
            'status' => 'completed',
            'limit' => 1
        ));
        
        if (!empty($orders)) {
            $order = $orders[0];
            $city = $order->get_billing_city();
            $country = $order->get_billing_country();
            
            if ($city && $country) {
                $country_name = WC()->countries->countries[$country] ?? $country;
                $customer_location = $city . ', ' . $country_name;
            } elseif ($city) {
                $customer_location = $city;
            } elseif ($country) {
                $country_name = WC()->countries->countries[$country] ?? $country;
                $customer_location = $country_name;
            }
        }
    }
    
    $testimonialsRes[] = [
        'review' => $review->comment_content,
        'name' => $review->comment_author,
        'email' => $review->comment_author_email, // Added email field
        'location' => $customer_location,
        'rating' => $rating ? intval($rating) : 5,
        'date' => $review->comment_date
    ];
}

// If no reviews exist, show fallback or empty state
if (empty($testimonialsRes)) {
    $testimonialsRes = [
        [
            'review' => 'No reviews yet. Be the first to review this product!',
            'name' => 'Be The First',
            'email' => '',
            'location' => 'Leave a Review',
            'rating' => 5,
        ]
    ];
}
?>

<section>
    <div>
        <div class="hale_container mx-auto flex md:flex-row flex-col gap-5 items-center">
            <div class="md:w-1/3 w-full">
                <h6 class="text-[#1C2E42] font-semibold flex gap-2 items-center">
                    Testimonials
                    <div class="sub_title_line"></div>
                </h6>
                <h2 class="h2 !text-left">
                    What Customers Says
                    <span class="text-[#47AFC3]">About Us</span>
                </h2>

            </div>
            <div class="md:w-2/3 w-full">
                <div class="pro_testi_slider">
                    <?php foreach ($testimonialsRes as $testimonial): ?>
                        <div>
                            <div class="testi_box">
                                <div class="testi_inner">

                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-page/qoute-icon.png'); ?>"
                                        alt="Quote Icon" class="w-[66px] h-[54px]">

                                    <p class="mt-4">
                                        <?php echo esc_html($testimonial['review']); ?>
                                    </p>

                                    <!-- Stars -->
                                    <div class="mt-2 flex gap-1">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++):
                                            ?>
                                            <span
                                                class="<?php echo $i <= $testimonial['rating'] ? 'text-[#FFAE00]' : 'text-gray-300'; ?>">
                                                ★
                                            </span>
                                        <?php endfor; ?>
                                    </div>

                                    <div class="mt-5 flex gap-2 items-center">
                                        <figure class="testi_img">
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-page/user.jpg'); ?>"
                                                alt="User" class="rounded-full w-[49px] h-[49px]">
                                        </figure>
                                        <div>
                                            <h6 class="testi_title">
                                                <?php echo esc_html($testimonial['name']); ?>
                                                <?php if (!empty($testimonial['email'])): ?>
                                                    <span class="text-xs text-gray-400 block">
                                                        <?php echo esc_html($testimonial['email']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </h6>
                                            <p class="text-[#1C1C1CE8]">
                                                <?php echo esc_html($testimonial['location']); ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <!-- Arrows -->
                <div class="flex justify-center gap-4 text-3xl mt-4">
                    <button class="testi-prev hover:text-[#47AFC3]">&#8592;</button>
                    <button class="testi-next hover:text-[#47AFC3]">&#8594;</button>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.pro_testi_slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: $('.testi-prev'),
            nextArrow: $('.testi-next'),
            dots: false,
            infinite: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: { slidesToShow: 3 }
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 2 }
                },
                {
                    breakpoint: 480,
                    settings: { slidesToShow: 1 }
                }
            ]
        });
    });
</script>
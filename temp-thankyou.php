<?php
/** Template Name: Thanks you */
get_header(); ?>

<!-- Event snippet for Submit lead form conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-18062243619/uaWTCPDZl5UcEKPu36RD',
      'value': 1.0,
      'currency': 'PKR'
  });
</script>
<section
    class="py-16 sm:h-[350px] h-[260px] flex items-center justify-center bg-cover bg-no-repeat bg-center bg-black/50 bg-blend-overlay"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-page/s2.webp'">
    <div class="hale_container">
        <h1 class="text-white font-bold text-3xl md:text-5xl lg:text-[51px]">
            <?php the_title(); ?>
        </h1>
    </div>
</section>
<section class="py-16">
    <div class="hale_container grid md:grid-cols-2 gap-6">
      <h2>Thank you for your order! We will contact you soon.</h2>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const data = sessionStorage.getItem("sizes_form_data");

        if (!data) return;

        const order = JSON.parse(data);

        // Fill summary
        document.getElementById("summary-product").innerText = order.product || "-";
        document.getElementById("summary-dimension").innerText = order.dimension || "-";
        document.getElementById("summary-stock").innerText = order.box_stock || "-";
        document.getElementById("summary-qty").innerText = order.quantity || "-";
        document.getElementById("summary-printing").innerText = order.printing || "-";
        document.getElementById("summary-price").innerText = order.total_price || "0";

        // Submit form (AJAX)
        document.getElementById("checkout-form").addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            // merge session data
            for (let key in order) {
                formData.append(key, order[key]);
            }

            formData.append("action", "submit_final_order");

            fetch(ajax_object.ajax_url, {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                       // alert("Order placed successfully!");
                        sessionStorage.removeItem("sizes_form_data");
                        window.location.href = "/";
                    } else {
                        //alert(res.data);
                    }
                });

        });

    });
</script>
<?php get_footer(); ?>
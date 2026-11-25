<?php
/** Template Name: Checkout */
get_header(); ?>
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
        <!-- LEFT: FORM -->
        <form id="checkout-form" class="bg-white p-6 rounded-xl shadow space-y-4">
            <h2 class="text-xl font-semibold mb-2">Customer Details</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <input type="text" name="name" placeholder="Full Name" class="hale_input">
                <input type="email" name="email" placeholder="Email Address" class="hale_input">
            </div>
            <input type="tel" name="phone" placeholder="Phone Number" class="hale_input">
            <textarea name="address" placeholder="Address" class="hale_input"></textarea>
            <button type="submit" class="btn_secondry max-w-[600px] w-full cursor-pointer">
                Place Order
            </button>
        </form>
        <!-- RIGHT: ORDER SUMMARY -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-2 text-title_Clr">
                <p><strong>Product:</strong> <span id="summary-product">Loading...</span></p>
                <p><strong>Dimension:</strong> <span id="summary-dimension">-</span></p>
                <p><strong>Stock:</strong> <span id="summary-stock">-</span></p>
                <p><strong>Quantity:</strong> <span id="summary-qty">-</span></p>
                <p><strong>Printing:</strong> <span id="summary-printing">-</span></p>
                <hr class="my-4">
                <p class="text-lg font-bold">
                    Total: £<span id="summary-price">0</span>
                </p>
            </div>

        </div>

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
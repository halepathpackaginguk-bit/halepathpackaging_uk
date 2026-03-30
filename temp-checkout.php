<?php
/** Template Name: Checkout */
get_header();?>




    <div class="grid md:grid-cols-2 gap-6">

        <!-- LEFT: FORM -->
        <form id="checkout-form" class="bg-white p-6 rounded-xl shadow space-y-4">

            <h2 class="text-xl font-semibold mb-2">Customer Details</h2>

            <input type="text" name="name" placeholder="Full Name"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400">

            <input type="email" name="email" placeholder="Email Address"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400">

            <input type="tel" name="phone" placeholder="Phone Number"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400">

            <textarea name="address" placeholder="Address"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400"></textarea>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">
                Place Order
            </button>

        </form>

        <!-- RIGHT: ORDER SUMMARY -->
        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

            <div class="space-y-2 text-gray-700">

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
</div>

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
                alert("Order placed successfully!");
                sessionStorage.removeItem("sizes_form_data");
                window.location.href = "/";
            } else {
                alert(res.data);
            }
        });

    });

});
</script>
<?php get_footer(); ?>

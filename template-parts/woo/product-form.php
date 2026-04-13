<?php
// Initialize wrapper class (you can also make it conditional if needed)
$quote_form_class = "container mx-auto mt-5 rounded-[19px] bg-[#CCCCCCB5]/70";

global $product;
$product_name = 'Product';
$product_price = 65;
$products_in_cat = wc_get_products($args);

// If viewing a single product
if (is_product() && $product) {
    $product_name = $product->get_name();
    $product_price = 65;
}

// If viewing a product category archive
elseif (is_product_category()) {
    $category = get_queried_object();
    if ($category && isset($category->name)) {
        $product_name = $category->name;
        $product_price = 65;
    }
}



?>


<section id="form-tabs" class="mt-10">

    <!-- Tabs Buttons -->
    <div class="hale_container !px-0 flex border-b border-gray-300 bg-white z-40">
        <button class="form_tab-btn form_tab_active" data-tab="tab1"> Request a Quote</button>
        <button class="form_tab-btn" data-tab="tab2">Standard Sizes</button>
    </div>

    <!-- Tabs Content -->
    <div class="tab-content mt-6">
        <div class="form_tab-panel" id="tab1">
            <!-- <h2 class="md:text-[28px] md:leading-normal text-2xl font-bold text-title_Clr">
                Get Custom Quote
            </h2> -->
            <div class="<?php echo esc_attr($quote_form_class); ?>">
                <form id="quote-form" class="grid w-full gap-2 items-center px-3 sm:px-5 py-6 md:py-10" method="POST"
                    enctype="multipart/form-data">
                    <div class="w-full gap-2.5">
                        <!-- Name + Phone -->
                        <section class="grid grid-cols-2 gap-2.5">
                            <div>
                                <label for="name" class="text-sm font-medium hidden">Name</label>
                                <input type="text" name="name" id="name" placeholder="Your Name" class="hale_input"
                                    required>
                            </div>
                            <div>
                                <label for="phone" class="text-sm font-medium hidden">Phone</label>
                                <input type="tel" name="phone" id="phone" placeholder="Phone Number" class="hale_input">
                            </div>
                        </section>

                        <!-- Email + Product -->
                        <section class="grid grid-cols-2 gap-2.5 mt-2.5">
                            <div>
                                <label for="email" class="text-sm font-medium hidden">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email Address"
                                    class="hale_input" required>
                            </div>
                            <div class="relative">
                                <label for="product" class="text-sm font-medium hidden">Select Product</label>
                                <input type="text" name="product" id="product" placeholder="product"
                                    value="<?php echo esc_html($product_name); ?>" class="hale_input">
                            </div>
                        </section>

                        <!-- Dimensions + Colors + Unit + Stock -->
                        <section class="grid grid-cols-3 gap-2 mt-2.5 items-start">
                            <div>
                                <label for="length" class="text-sm font-medium hidden">Length</label>
                                <input type="number" name="length" id="length" placeholder="Length" class="hale_input">
                            </div>
                            <div>
                                <label for="width" class="text-sm font-medium hidden">Width</label>
                                <input type="number" name="width" id="width" placeholder="Width" class="hale_input">
                            </div>
                            <div>
                                <label for="depth" class="text-sm font-medium hidden">Depth</label>
                                <input type="number" name="depth" id="depth" placeholder="Depth" class="hale_input">
                            </div>
                        </section>

                        <section class="grid grid-cols-3 gap-2 mt-2.5">
                            <div class="relative">
                                <label for="colors" class="text-sm font-medium hidden">Select Colors</label>
                                <select name="colors" id="colors" class="hale_input h-full appearance-none">

                                    <option value="1">1 Color</option>
                                    <option value="2">2 Colors</option>
                                    <option value="3">3 Colors</option>
                                    <option value="4">4 Colors</option>
                                    <option value="5">5 Colors</option>
                                </select>

                            </div>

                            <div class="relative">
                                <label for="unit" class="text-sm font-medium hidden">Quantity</label>
                                <input type="number" name="unit" id="unit" placeholder="Quantity" class="hale_input" />

                            </div>
                            <!-- <div>
                                <input type="file" id="fileInput" name="file" style="display:none;">
                                <button type="button" id="uploadBtn"
                                    class="flex items-center text-nowrap whitespace-nowrap justify-center px-12 py-3 font-medium text-white bg-[#53B6C9] hover:bg-secondary-dark rounded-full">
                                    Attached File
                                </button>
                            </div>

                         
                            <p id="fileName"></p> -->


                            <!-- <input type="file"  id="file" name="file"> -->


                        </section>

                        <!-- Message -->
                        <section class="col-span-2 md:col-span-1 mt-2.5">
                            <textarea name="message" id="message" rows="3" placeholder="Write Your Message..."
                                class="hale_input rounded-[20px]! h-[141px]"></textarea>
                        </section>

                        <!-- Agree Checkbox -->
                        <div class="flex gap-2 mt-3 items-center">
                            <input type="checkbox" name="agree" id="agree" class="p-2 w-4 h-4" required>
                            <label for="agree" class="cursor-pointer text-sm">
                                I Agree that my data is <strong>collected and Stored.</strong>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <section class="flex items-center gap-2 justify-between mt-2.5">
                        <div class="w-full">
                            <button type="submit" class="btn_secondry w-full">
                                SUBMIT
                            </button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
        <div class="form_tab-panel hidden" id="tab2">
            <div class="<?php echo esc_attr($quote_form_class); ?>">
                <form id="sizes-form" class="grid w-full gap-2 items-center px-3 sm:px-5 py-6 md:py-10" method="POST">
                    <h2 class="md:text-[28px] md:leading-normal text-2xl font-bold text-title_Clr">
                        Available Sizes for <?php echo esc_html($product_name); ?>
                    </h2>
                    <p>
                        Choose from our popular Standard Sizes for a quick, off-the-shelf solution, or request a Custom
                        Quote for a perfect, tailored fit. Whether you need something immediately or designed
                        specifically for your brand, we provide flexible options to meet every need and budget.
                    </p>
                    <input type="hidden" name="product" id="product" placeholder="product"
                        value="<?php echo esc_html($product_name); ?>" class="hale_input">
                    <div class="w-full gap-2.5">
                        <section class="grid md:grid-cols-4 grid-cols-2 gap-2 mt-2.5">
                            <div class="relative">
                                <label for="dimension" class="text-sm font-medium hidden">dimension</label>
                                <select name="dimension" id="dimension" class="hale_input h-full appearance-none"
                                    required>
                                    <option value="5 x 4 x 1">5 x 4 x 1</option>
                                    <option value="6 x 5 x 2">6 x 5 x 2</option>
                                </select>
                                <i
                                    class="absolute right-4 top-1/2 text-xl text-gray-500 -translate-y-1/2 fa fa-chevron-down"></i>
                            </div>
                            <div class="relative">
                                <label for="box_stock" class="text-sm font-medium hidden">Box Stock</label>

                                <select name="box_stock" id="box_stock" class="hale_input h-full appearance-none"
                                    required>
                                    <option value="Rigid">Rigid</option>
                                    <option value="Foldable">Foldable</option>
                                </select>
                                <i
                                    class="absolute right-4 top-1/2 text-xl text-gray-500 -translate-y-1/2 fa fa-chevron-down"></i>
                            </div>
                            <div class="relative">
                                <label for="quantity" class="text-sm font-medium hidden">Quantity</label>
                                <select name="quantity" id="quantity" class="hale_input h-full appearance-none"
                                    required>
                                    <?php if (has_term('flexible-packaging', 'product_cat', get_the_ID())) : ?>
                                    <option value="10">10000</option>
                                    <option value="20">20000</option>

                                    <?php else : ?>
                                    <option value="10">10000</option>
                                    <option value="20">20000</option>
                                    <?php endif; ?>
                                </select>

                            </div>
                            <div class="relative">
                                <label for="printing" class="text-sm font-medium hidden">Printing</label>
                                <select name="printing" id="printing" class="hale_input h-full appearance-none"
                                    required>
                                    <option value="outside_only">Outside only</option>
                                    <option value="inside_outside">Inside &amp; outside</option>
                                </select>
                                <i
                                    class="absolute right-4 top-1/2 text-xl text-gray-500 -translate-y-1/2 fa fa-chevron-down"></i>
                            </div>
                        </section>
                        <p id="price-display" data-price="<?php echo esc_attr($product_price); ?>"
                            style="margin-top:20px; font-size:16px;">

                        </p>
                    </div>
                    <!-- Submit Button -->
                    <section class="flex items-center gap-2 justify-between mt-2.5">
                        <div class="w-full">
                            <button type="submit" class="btn_secondry w-1/2">
                                Proceed to Checkout
                            </button>
                        </div>
                    </section>
                    <div class="grid md:grid-cols-3 grid-cols-2 gap-5 mt-8">
                        <div class="text-center text-title_Clr space-y-2.5">
                            <i class="fa fa-clock" style="font-size:32px;"></i>
                            <p><strong>Quick</strong><br>Turnaround</p>
                        </div>
                        <div class="text-center text-title_Clr space-y-2.5">
                            <i class="fa fa-pencil-square" style="font-size:32px;"></i>
                            <p><strong>Free</strong><br>Designing</p>
                        </div>
                        <div class="text-center text-title_Clr space-y-2.5">
                            <i class="fa fa-truck" style="font-size:32px;"></i>
                            <p><strong>Free</strong><br>Shipping</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>




<script>
document.addEventListener('DOMContentLoaded', function() {

    /* ========= TAB SWITCHING ========= */

    const tabButtons = document.querySelectorAll('.form_tab-btn');
    const tabPanels = document.querySelectorAll('.form_tab-panel');

    function openTab(tabId) {
        tabPanels.forEach(panel => panel.classList.add('hidden'));
        tabButtons.forEach(btn => btn.classList.remove('form_tab_active'));

        const activePanel = document.getElementById(tabId);
        const activeBtn = document.querySelector(`.form_tab-btn[data-tab="${tabId}"]`);

        if (activePanel) activePanel.classList.remove('hidden');
        if (activeBtn) activeBtn.classList.add('form_tab_active');
    }

    if (tabButtons.length > 0) {
        openTab(tabButtons[0].dataset.tab);
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            openTab(this.dataset.tab);
        });
    });


    /* ========= PRICE + TITLE UPDATE ========= */

    const quantitySelect = document.getElementById('quantity');
    const priceDisplay = document.getElementById('price-display');

    function updatePrice() {

        if (!quantitySelect || !priceDisplay) return;

        const basePrice = parseFloat(priceDisplay.dataset.price) || 65;

        // ✅ get actual quantity (100, 200)
        const qty = parseInt(quantitySelect.value) || 1;

        const total = basePrice * qty;

        const isFlexible =
            <?php echo has_term('flexible-packaging', 'product_cat', get_the_ID()) ? 'true' : 'false'; ?>;

        if (isFlexible) {
            priceDisplay.innerHTML = `<strong>Price:</strong> £${total} for ${qty}000 items`;
        } else {
            priceDisplay.innerHTML = `<strong>Price:</strong> £${total} for ${qty}000 items`;
        }

        // ✅ UPDATE INPUT FIELD
        const totalPriceInput = document.getElementById('total_price');
        if (totalPriceInput) {
            totalPriceInput.value = total;
        }
    }
    if (quantitySelect) {
        quantitySelect.addEventListener('change', updatePrice);
        updatePrice();
    }

    /* ========= QUOTE FORM PRICE CALCULATION ========= */

    const quoteForm = document.getElementById('quote-form');
    const quotePriceDisplay = document.getElementById('quote-price-display');

    if (quoteForm) {

        const length = quoteForm.querySelector('#length');
        const width = quoteForm.querySelector('#width');
        const depth = quoteForm.querySelector('#depth');
        const colors = quoteForm.querySelector('#colors');
        const stock = quoteForm.querySelector('#stock');

        function calculateQuotePrice() {

            const basePrice = parseFloat(quotePriceDisplay.dataset.basePrice) || 0;

            const l = parseFloat(length.value) || 0;
            const w = parseFloat(width.value) || 0;
            const d = parseFloat(depth.value) || 0;
            const c = parseInt(colors.value) || 1;
            const s = parseInt(stock.value) || 1;

            // ===== CUSTOM LOGIC =====
            let base = (l + w + d); // size factor
            let colorCost = c * 5;
            let stockCost = s * 0;

            // ✅ ADD BASE PRICE HERE
            let total = basePrice + (base * colorCost) + stockCost;

            // ✅ If no input yet → show base price only
            if (l === 0 && w === 0 && d === 0) {
                quotePriceDisplay.innerHTML =
                    `<strong>Estimated Price:</strong> £${basePrice}`;
                return basePrice;
            }

            if (quotePriceDisplay) {
                quotePriceDisplay.innerHTML =
                    `<strong>Estimated Price:</strong> £${total.toFixed(2)}`;
            }

            return total;
        }
        // trigger on change
        [length, width, depth, colors, stock].forEach(el => {
            if (el) el.addEventListener('input', calculateQuotePrice);
        });

        // ===== ADD TO FORMDATA =====
        quoteForm.addEventListener('submit', function(e) {

            e.preventDefault();

            const formData = new FormData(this);
            const data = {};

            const totalPrice = calculateQuotePrice();

            formData.append('quote_price', totalPrice);

            formData.forEach((value, key) => {
                data[key] = value;
            });

            console.log('Quote Form Submitted');
            console.log(data);
        });
    }
    /* ========= FORM DATA CONSOLE TEST ========= */

    const forms = document.querySelectorAll('#sizes-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {

            e.preventDefault();

            const formData = new FormData(this);
            const data = {};

            // ===== GET TOTAL PRICE =====
            const priceDisplay = document.getElementById('price-display');
            const quantitySelect = document.getElementById('quantity');

            let totalPrice = 0;

            if (priceDisplay && quantitySelect) {
                const basePrice = parseFloat(priceDisplay.dataset.price) || 0;
                const qty = parseInt(quantitySelect.value) || 1;
                totalPrice = basePrice * qty;

                // ADD TO FORMDATA
                formData.set('total_price', totalPrice);
            }

            // convert to object (for debug)
            formData.forEach((value, key) => {
                data[key] = value;
            });

            console.log('Form Submitted:', this.id);
            console.log(data);
        });
    });
});
</script>
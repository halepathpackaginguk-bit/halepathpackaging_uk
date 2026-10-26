<section class="bg-gray-50 py-12 lg:py-16">
    <div class="mx-auto container px-4">
        <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-[1fr_1.15fr] lg:gap-12">

            <!-- Left Content -->
            <div>
                <span
                    class="mb-3 inline-flex rounded-full border border-secondary/20 bg-white px-3 py-1 text-xs font-medium text-secondary">
                    What Sets Us Apart From Others
                </span>

                <h2 class="mb-3 text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                    Why Choose Hale Path Packaging?
                </h2>

                <p class="mb-6 text-sm leading-6 text-txt_Clr md:text-base">
                    Because Hale Path Packaging helps businesses protect and present their products with custom,
                    eco-friendly, and durable packaging. If you sell online, serve food and drinks, or run a retail
                    store, we design solutions that fit your brand.
                </p>

                <!-- Feature Cards -->
                <div class="grid grid-cols-2 gap-3">

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/glob.png'); ?>"
                            alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            No Plastic Options
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/studio.png'); ?>"
                            alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Customisation Solutions
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/price_icon.png'); ?>"
                            alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Low Minimum Order Qty
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/house.png'); ?>"
                            alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Free Shipping
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/agent.png'); ?>"
                            alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Free Graphic Design
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/capacity.png'); ?>"
                            alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Quick Turnaround Time
                        </h3>
                    </div>

                </div>
            </div>

            <!-- Right Quote Form -->
            <div class="overflow-hidden rounded-lg border border-secondary/20 bg-white shadow-md">

                <!-- Form Header -->
                <div class="bg-secondary px-5 py-4">
                    <h2 class="text-xl font-bold text-white sm:text-2xl">
                        Get a Quote
                    </h2>
                    <p class="mt-1 text-sm text-white">
                        Let us help you find the perfect packaging needs.
                    </p>
                </div>

                <?php if (isset($_GET['quote_status'])): ?>
                    <?php if ('success' === $_GET['quote_status']): ?>
                        <div class="mx-5 mt-5 rounded border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            Thank you! Your quote request has been sent successfully.
                        </div>
                    <?php else: ?>
                        <div class="mx-5 mt-5 rounded border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                            Sorry, your request could not be sent. Please check the required fields and try again.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <form id="custom-packaging-quote" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                    method="post" class="space-y-4 p-5">
                    <input type="hidden" name="action" value="custom_packaging_quote">
                    <?php wp_nonce_field('custom_packaging_quote_action', 'custom_packaging_quote_nonce'); ?>

                    <h3 class="border-b border-secondary/20 pb-2 text-base font-semibold text-title_Clr">
                        Contact Information
                    </h3>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Full Name *
                            </label>
                            <input type="text" name="full_name" placeholder="Enter full name" required
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Phone Number *
                            </label>
                            <input type="tel" name="phone" placeholder="Enter phone number" required
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Email *
                            </label>
                            <input type="email" name="email" placeholder="Enter email" required
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Company
                            </label>
                            <input type="text" name="company" placeholder="Enter company"
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>
                    </div>

                    <h3 class="border-b border-secondary/20 pb-2 text-base font-semibold text-title_Clr">
                        Box Specifications
                    </h3>

                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Length *</label>
                            <input type="number" name="length" min="0" step="any" placeholder="Length" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Width *</label>
                            <input type="number" name="width" min="0" step="any" placeholder="Width" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Height *</label>
                            <input type="number" name="height" min="0" step="any" placeholder="Height" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Unit *</label>
                            <select name="unit" required
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="inches">Inches</option>
                                <option value="cm">CM</option>
                                <option value="mm">MM</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Material Type *</label>
                            <select name="material" required
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="">Select material</option>
                                <option value="cardboard">Cardboard</option>
                                <option value="corrugated">Corrugated</option>
                                <option value="kraft">Kraft</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Print Sides</label>
                            <select name="print_sides"
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="single">Single Side</option>
                                <option value="double">Double Side</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Quantity *</label>
                            <input type="number" name="quantity" min="1" placeholder="Quantity" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Coating</label>
                            <select name="coating"
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="none">No Coating</option>
                                <option value="matte">Matte</option>
                                <option value="gloss">Gloss</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Product Style</label>
                            <select name="product_style"
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="">Select style</option>
                                <option value="mailer">Mailer Box</option>
                                <option value="folding">Folding Carton</option>
                                <option value="shipping">Shipping Box</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-title_Clr">
                            Describe your packaging requirements
                        </label>
                        <textarea name="requirements" rows="3" placeholder="Describe your product specifications..."
                            class="w-full resize-y rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full rounded bg-secondary px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary md:text-base">
                        ➤ Send Quote Request
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
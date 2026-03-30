<?php
$steps = [
    [
        "id" => 1,
        "title" => "Place Your Order",
        "description" => "Place your order online quickly and easily, share your requirements, receive a fast quote, and start your packaging project confidently."
    ],
    [
        "id" => 2,
        "title" => "Artwork Creation",
        "description" => "Our expert team creates custom packaging designs, provides mockups for approval, and ensures your branding looks professional and impactful."
    ],
    [
        "id" => 3,
        "title" => "Production",
        "description" => "Review final details, approve artwork and specifications, confirm pricing, and give production approval before we begin manufacturing your packaging."
    ],
    [
        "id" => 4,
        "title" => "Fast Doorstep Delivery",
        "description" => "Your finished packaging is carefully produced, securely packed, and delivered on time across the UK with reliable tracking."
    ],
];
?>

<section
    class='md:py-14 py-10 relative bg-center bg-no-repeat bg-cover before:content-[""] before:absolute before:w-full before:bg-[#191919]  before:h-full before:top-0'
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/qoute-bg.png'">
    <div class="hale_container relative z-10 flex md:flex-row flex-col gap-7">
        <div class="md:w-1/2 w-full">

            <div
                class="bg-white/5 backdrop-blur-[10px] h-full max-w-[546px] mx-auto rounded-2xl md:px-14 md:py-8 p-8 md:gap-12 gap-12 flex flex-col">
                <?php foreach ($steps as $index => $step): ?>
                    <div class="step">
                        <span
                            class="before_line <?php echo ($index === count($steps) - 1) ? 'before:content-none' : 'before:content-[""] '; ?>">
                            <?php echo '0' . esc_html($step['id']); ?>
                        </span>

                        <div>
                            <h4 class="">
                                <?php echo esc_html($step['title']); ?>
                            </h4>
                            <p class="text-sm font-light text-white">
                                <?php echo esc_html($step['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="md:w-1/2 w-full">
            <h4 class="text-xl font-semibold text-white mb-4 flex items-center gap-3 sm:justify-start justify-center">
                <span> Stronger Protection. </span>
                <span class="block border-b-2 border-white max-w-[61px] w-full"></span>
            </h4>
            <h2 class="md:text-4xl text-2xl font-bold text-white mb-8 sm:text-left text-center">
                Smarter Branding. Guaranteed Impact.
            </h2>
            <form id="contact-form"
                class="grid w-full gap-4 items-center mt-5 bg-white/5 backdrop-blur-[10px] md:p-8 p-6 rounded-[19px]">
                <div class="w-full flex md:flex-row flex-col gap-4">
                    <div class="form_row">
                        <label htmlfor="fullname" class="hidden">
                            Full Name
                        </label>
                        <input class="hale_input" type="text" name="fullname" id="fullname" placeholder="Full Name" />
                    </div>
                    <div class="form_row">
                        <label htmlfor="phone" class="hidden">
                            Your Contact
                        </label>
                        <input class="hale_input" type="tel" name="phone" id="phone" placeholder="Your Contact" />
                    </div>
                </div>
                <div class="w-full flex md:flex-row flex-col gap-4">
                    <div class="form_row">
                        <label htmlfor="email" class="hidden">
                            Email Address
                        </label>
                        <input class="hale_input" type="email" name="email" id="email" placeholder="Email  Address" />
                    </div>
                    <div class="form_row">
                        <label htmlfor="product" class="hidden">
                            Cosmetics Packaging
                        </label>
                        <select class="hale_input" name="product" id="product">
                            <option value="select the Product">select the Product</option>
                            <option value="Product1">Product1</option>
                        </select>
                    </div>
                </div>
                <div class="w-full">
                    <label htmlfor="message" class="hidden">
                        Your Message
                    </label>
                    <textarea class="hale_input rounded-[19px]! !min-h-[170px] md:pt-2" id="message" name="message"
                        rows="3" placeholder="Write Your Message..."></textarea>
                </div>
                <div class="w-full">
                    <input type="checkbox"
                        class="bg-transparent px-7  border-2 border-white focus:border-secondary outline-white mr-2"
                        name="acceptance" id="acceptance" />
                    <label htmlfor="acceptance"
                        class="md:text-lg md:md:leading-[56px] text-sm font-normal text-white inline-block">
                        I Agree that my data is collected and Stored.
                    </label>
                </div>
                <div class="w-full">
                    <button type="submit" class="form_btn">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
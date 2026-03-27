<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package halepath_theme
 */

?>


<footer class="pt-14 relative bg-[#f5f5f5]">
    <div class="hale_container grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 justify-between 2xl:gap-5 md:gap-4 gap-5">
        <!-- Company -->
        <div>
            <h6 class="footer_title">
                Company
                <span class=""></span>
            </h6>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'company',
                'container' => false,
                'menu_class' => 'flex flex-col gap-2.5',
                'fallback_cb' => false,
                'link_before' => '<span class="marker"></span>',
                'link_after' => '',
            ));
            ?>
        </div>
        <!-- Products Packaging -->
        <div>
            <h6 class="footer_title">
                Innovation
                <span class=""></span>
            </h6>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'innovation',
                'container' => false,
                'menu_class' => 'flex flex-col gap-2.5',
                'fallback_cb' => false,
                'link_before' => '<span class="marker"></span>',
                'link_after' => '',
            ));
            ?>
        </div>
        <!-- Packaging Style -->
        <div>
            <h6 class="footer_title">
                Packaging Products
                <span class=""></span>
            </h6>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'packaging',
                'container' => false,
                'menu_class' => 'flex flex-col gap-2.5',
                'fallback_cb' => false,
                'link_before' => '<span class="marker"></span>',
                'link_after' => '',
            ));
            ?>
        </div>
        <!-- Inspiration -->
        <div>
            <h6 class="footer_title">
                Services
                <span class=""></span>
            </h6>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'services',
                'container' => false,
                'menu_class' => 'flex flex-col gap-2.5',
                'fallback_cb' => false,
                'link_before' => '<span class="marker"></span>',
                'link_after' => '',
            ));
            ?>
        </div>
        <!-- Contact -->
        <div>
            <h6 class="footer_title">
                Connect With Us
                <span class=""></span>
            </h6>
            <ul class="flex flex-col gap-2.5">
                <li>
                    Unit 229, 32A Birmingham Road Bromsgrove B61 0DD
                </li>
                <li><a href="tel:+4401213186768" class="footer_link">
                        01213186768</a></li>
                <li><a href="mailto:sales@halepathpackaging.co.uk" target="_blank" class="footer_link">
                        sales@halepathpackaging.co.uk</a></li>
            </ul>
        </div>
    </div>

    <!-- Reviews & Partners -->
    <div class="hale_container flex md:flex-row flex-col md:items-center justify-between 2xl:gap-7 md:gap-4 gap-7 mt-7">
        <div>
            <h6 class="text-base font-semibold text-title_Clr mb-6">Where We’re Trusted</h6>
            <div class="flex flex-wrap sm:flex-nowrap gap-5 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/google-reviws.png"
                    alt="google-reviws" class="md:w-full w-1/3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trustpilot.png" alt="trustpilot"
                    class="md:w-full w-1/3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bbb.png" alt="bbb"
                    class="md:w-full w-1/3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews-io.png" alt="reviews-io"
                    class="md:w-full w-1/3">
            </div>
        </div>
        <div>
            <h6 class="text-base font-semibold text-title_Clr mb-6">Our Logistics Partners</h6>
            <div class="flex justify-end items-end">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fedex.png" alt="fedex">
            </div>
        </div>
    </div>

    <!-- Logo & Social -->
    <div
        class="hale_container flex md:flex-row flex-col md:items-center justify-between 2xl:gap-7 md:gap-4 gap-7 mt-7 py-2.5">
        <div class="flex gap-3 items-center">
            <a href="<?php echo home_url(); ?>"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo"></a>
            <ul class="flex items-center gap-3">
                <li><a href="#" target="_blank" class="text-2xl inline-flex">
                        <i class="fab fa-facebook-f text-title_Clr hover:text-primary"></i></a></li>
                <li><a href="#" target="_blank" class="text-2xl inline-flex">
                        <i class="fab fa-instagram text-title_Clr hover:text-primary"></i></a></li>
                <li><a href="#" target="_blank" class="text-2xl inline-flex">
                        <i class="fa-brands fa-linkedin-in text-title_Clr hover:text-primary"></i></a></li>
                <li><a href="#" target="_blank" class="text-2xl inline-flex">
                        <i class="fa-brands fa-whatsapp text-title_Clr hover:text-primary"></i></a></li>
            </ul>
        </div>
        <div class="">
            <p class="md:text-base text-sm font-normal text-title_Clr md:text-end">
                © 2026 Hale Path Packaging. All Rights Reserved.
            </p>
            <p class="md:text-base text-sm font-normal text-title_Clr md:text-end">
                <a href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a> | <a
                    href="<?php echo site_url('/terms-conditions'); ?>">Terms & Conditions</a>
            </p>
        </div>
    </div>
    <button id="scrollToTopBtn"
        class="fixed bottom-6 right-6 bg-primary text-white p-3 rounded-full shadow-lg hidden hover:bg-secondary transition"
        aria-label="Scroll to top">
        ↑
    </button>
</footer>

<?php wp_footer(); ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const scrollBtn = document.getElementById('scrollToTopBtn');
        const popup = document.getElementById('quotePopup');
        const closeBtn = document.getElementById('closeQuote_Popup');
        const footer = document.querySelector('footer');

        let popupShown = false;

        window.addEventListener('scroll', () => {

            // Scroll-to-top button
            if (window.scrollY > 300) {
                scrollBtn?.classList.remove('hidden');
            } else {
                scrollBtn?.classList.add('hidden');
            }

            if (footer) {
                const footerTop = footer.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                // Show popup when footer enters viewport
                if (footerTop <= windowHeight && !popupShown) {
                    popup?.classList.remove('translate-x-full', 'opacity-0', 'pointer-events-none');
                    popup?.classList.add('translate-x-0', 'opacity-100');
                    popupShown = true;
                }

                // Reset when footer leaves viewport (so it can trigger again)
                if (footerTop > windowHeight) {
                    popupShown = false;
                }
            }
        });

        // Close popup (icon click)
        closeBtn?.addEventListener('click', () => {
            closePopup();
        });

        // Close when clicking outside
        popup?.addEventListener('click', (e) => {
            if (e.target === popup) {
                closePopup();
            }
        });

        // ESC key close
        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape") {
                closePopup();
            }
        });

        function closePopup() {
            popup?.classList.add('translate-x-full', 'opacity-0', 'pointer-events-none');
            popup?.classList.remove('translate-x-0', 'opacity-100');
        }

        // Scroll to top
        scrollBtn?.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

    });
</script>

</body>

</html>
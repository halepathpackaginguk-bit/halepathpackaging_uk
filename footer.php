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
                        +44 01213186768</a></li>
                <li><a href="mailto:sales@halepathpackaging.co.uk" target="_blank" class="footer_link">
                        sales@halepathpackaging.co.uk</a></li>
            </ul>
        </div>
    </div>

    <!-- Reviews & Partners -->
    <div class="hale_container flex md:flex-row flex-col md:items-center justify-between 2xl:gap-7 md:gap-4 gap-7 mt-7">
        <div>
            <h6 class="text-base font-semibold text-title_Clr mb-6">Where We’re Trusted</h6>
            <div class="flex flex-wrap sm:flex-nowrap sm:gap-5 gap-2 items-center">
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
                <li><a href="https://www.facebook.com/profile.php?id=61586916928562" target="_blank"
                        class="text-2xl inline-flex">
                        <i class="fab fa-facebook-f text-title_Clr hover:text-primary"></i></a></li>
                <li><a href="https://www.instagram.com/halepathpackaging.uk?igsh=MW1tY3pyczV2emdzNw%3D%3D"
                        target="_blank" class="text-2xl inline-flex">
                        <i class="fab fa-instagram text-title_Clr hover:text-primary"></i></a></li>
                <li><a href="https://www.tiktok.com/@halepathpackaging?_r=1&_t=ZS-957Rlv6JhMV" target="_blank" class="text-2xl inline-flex">
                        <i class="fa-brands fa-tiktok text-title_Clr hover:text-primary"></i></a></li>
                <li><a href="https://wa.me/447893945259" target="_blank" class="text-2xl inline-flex">
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
<button id="openQuotePopup"
    class="sm:block hidden fixed top-1/2 -translate-y-1/2 right-5 h-[365px] bg-white/30 backdrop-blur-[10px] text-2xl text-title_Clr px-3 sm:px-5 rounded-[19px] z-[999]">
    <span>Get a Quote</span>
</button>
<div id="quotePopup" class="fixed inset-0 w-full bg-transparent flex flex-col items-end justify-center z-50 
     translate-x-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
    <?php get_template_part('template-parts/main-popup'); ?>
</div>

<!-- WhatsApp Chat Widget -->
<div id="waChatWidget" class="fixed bottom-5 left-5 z-[9999] flex flex-col items-start">
    <!-- Chat Popup -->
    <div id="waChatBox"
        class="wa-chat-box mb-4 w-[calc(100vw-2.5rem)] max-w-[360px] bg-white rounded-[22px] overflow-hidden shadow-[0_25px_60px_-15px_rgba(0,0,0,0.4)] hidden">
        <!-- Header -->
        <div class="wa-header relative px-5 py-4 flex items-center gap-3.5">
            <span class="wa-header-deco absolute inset-0 pointer-events-none"></span>
            <div class="relative shrink-0">
                <div class="wa-avatar-ring w-12 h-12 rounded-full flex items-center justify-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                        alt="Hale Path Packaging" class="w-9 h-9 rounded-full object-contain bg-white p-1">
                </div>
                <span class="wa-online-dot absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-[#25D366] border-2 border-white rounded-full"></span>
            </div>
            <div class="text-white relative z-[1]">
                <p class="font-bold text-[15px] leading-tight">Hale Path Packaging</p>
                <div class="flex items-center gap-1.5 mt-1">
                    <span class="wa-typing"><i></i><i></i><i></i></span>
                    <span class="text-xs opacity-90">Typically replies in minutes</span>
                </div>
            </div>
        </div>
        <!-- Body -->
        <div class="wa-body relative px-4 py-5">
            <div class="wa-bubble bg-white rounded-2xl rounded-tl-md px-4 py-3 shadow-[0_4px_14px_rgba(0,0,0,0.08)] max-w-[85%]">
                <p class="text-sm text-[#1c1c1c] leading-relaxed">Hello there! 👋</p>
            </div>
            <div class="wa-bubble wa-bubble-2 bg-white rounded-2xl rounded-tl-md px-4 py-3 shadow-[0_4px_14px_rgba(0,0,0,0.08)] max-w-[92%] mt-2.5">
                <p class="text-sm text-[#1c1c1c] leading-relaxed">Welcome to <strong>Hale Path Packaging</strong> — how can we help you today? 😊</p>
                <p class="text-[10px] text-gray-400 mt-1.5 text-right flex items-center justify-end gap-1">
                    12:30 <i class="fa-solid fa-check-double text-[#53BDEB] text-[10px]"></i>
                </p>
            </div>
            <a href="https://wa.me/447893945259?text=<?php echo rawurlencode('Hello Hale Path Packaging! I have a question.'); ?>"
                target="_blank"
                class="wa-chat-btn group mt-4 flex items-center justify-center gap-2.5 w-full text-white font-bold text-[15px] py-3.5 rounded-full relative overflow-hidden">
                <i class="fab fa-whatsapp text-2xl group-hover:rotate-12 transition-transform"></i>
                Start Chat
            </a>
            <p class="text-center text-[11px] text-gray-500 mt-3">💬 Free & instant — no app install needed</p>
        </div>
    </div>
    <!-- Toggle Button -->
    <button id="waChatBtn"
        class="wa-float-btn relative flex items-center justify-center w-16 h-16 rounded-full text-white text-4xl"
        aria-label="Open WhatsApp chat">
        <span class="wa-badge absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center shadow-md">1</span>
        <i class="fa-brands fa-whatsapp wa-ico-open"></i>
        <span class="wa-tooltip absolute left-[76px] top-1/2 -translate-y-1/2 whitespace-nowrap bg-[#075E54] text-white text-xs font-semibold px-3.5 py-2 rounded-lg opacity-0 pointer-events-none transition-all duration-300">
            Chat with us
            <span class="absolute -left-1 top-1/2 -translate-y-1/2 w-2 h-2 bg-[#075E54] rotate-45"></span>
        </span>
    </button>
</div>
<?php wp_footer(); ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const popup = document.getElementById('quotePopup');
        const closeBtn = document.getElementById('closeQuote_Popup');
        const openBtn = document.getElementById('openQuotePopup');      
        const popupWidth = 850; 
        // OPEN POPUP
        openBtn?.addEventListener('click', () => {
            popup?.classList.remove('translate-x-full', 'opacity-0', 'pointer-events-none');
            popup?.classList.add('translate-x-0', 'opacity-100');

            // Move button left
            openBtn.style.right = popupWidth + "px";
        });

        // CLOSE POPUP (icon click)
        closeBtn?.addEventListener('click', closePopup);

        // CLOSE when clicking outside
        popup?.addEventListener('click', (e) => {
            if (e.target === popup) {
                closePopup();
            }
        });

        // CLOSE with ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape") {
                closePopup();
            }
        });

        function closePopup() {
            popup?.classList.add('translate-x-full', 'opacity-0', 'pointer-events-none');
            popup?.classList.remove('translate-x-0', 'opacity-100');

            // Move button back to original position
            openBtn.style.right = "20px";
        }

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const waBox = document.getElementById('waChatBox');
        const waBtn = document.getElementById('waChatBtn');
        const waBadge = waBtn?.querySelector('.wa-badge');

        waBtn?.addEventListener('click', () => {
            waBox?.classList.toggle('hidden');
            waBadge?.classList.add('hidden');
        });

        document.addEventListener('click', (e) => {
            const widget = document.getElementById('waChatWidget');
            if (widget && !widget.contains(e.target)) {
                waBox?.classList.add('hidden');
                waBadge?.classList.remove('hidden');
            }
        });
    });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6158671cd326717cb68465b2/1fh0l5idi';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



</body>

</html>
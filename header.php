<?php
/**
 * Main header template.
 *
 * Loads the menu configuration, then renders the document head, top bar,
 * site logo, navigation, mobile menu and mega menus.
 *
 * @package halepath_theme
 */

$megaMenus = require get_template_directory() . '/inc/mega-menu.php';
$theme_uri = get_template_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-NJ65R553');</script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18062243619"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'AW-18062243619');
    </script>
    <!-- End Google tag (gtag.js) -->

    <?php if (is_search()) : ?>
    <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>

    <meta name="google-site-verification" content="vxJVqkHpw-YU0K97Hbs-wFEVtQhadmF2d19hVFWCuSU">
    <meta name="trustpilot-one-time-domain-verification-id" content="ae39cbe4-c17f-458d-ad5d-f78d10d14bdd">

    <link rel="shortcut icon" href="<?php echo esc_url($theme_uri . '/favicon.ico'); ?>">
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

    <!-- Resource hints for third-party origins -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://embed.tawk.to">

    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <link rel="stylesheet" href="<?php echo esc_url($theme_uri . '/custom.css'); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJ65R553" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <?php if (!wp_is_mobile()) : ?>
        <?php get_template_part('template-parts/theme/top-bar'); ?>
        <?php endif; ?>

        <!-- Header -->
        <header class="bg-[#f5f5f5] sticky top-0 z-50 sm:py-[15px]">
            <div class="hale_container py-1 flex lg:flex-col flex-row items-center justify-between gap-5">
                <!-- Logo -->
                <div class="lg:hidden w-1/2">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/logo.png'); ?>" alt="Hale Path Packaging"
                            height="60" width="60" />
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="lg:w-full w-1/2 flex lg:justify-center justify-end items-center">
                    <button id="mobileMenuBtn" type="button" class="lg:hidden" aria-label="Toggle navigation menu"
                        aria-controls="mobileMenu" aria-expanded="false">
                        <svg id="mobileMenuIcon" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <!-- Hamburger -->
                            <path id="hamburgerIcon" stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <!-- Close -->
                            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <ul id="desktopNav" class="hidden lg:flex gap-1.5 justify-between w-full">
                        <?php foreach ($megaMenus as $key => $menu) :
                            $isMega     = !empty($menu['groups']);
                            $isDropdown = empty($menu['groups']) && !empty($menu['items']);

                            $li_attrs  = $isMega ? ' data-mega-target="megaMenu-' . esc_attr($key) . '"' : '';
                            $li_attrs .= $isDropdown ? ' data-sub-target="subMenu-' . esc_attr($key) . '"' : '';
                            ?>
                        <li class="relative cursor-pointer flex items-center"<?php echo $li_attrs; ?>>

                            <a href="<?php echo esc_url($menu['link']); ?>"
                                class="text-sm font-normal capitalize text-title_Clr hover:text-white hover:bg-secondary px-2 py-2 rounded-[30px] flex items-center">
                                <?php echo esc_html($menu['title']); ?>
                                <?php if ($isMega || $isDropdown) : ?>
                                <i class="fa fa-chevron-down ml-1.5" aria-hidden="true"></i>
                                <?php endif; ?>
                            </a>

                            <?php if ($isDropdown) : ?>
                            <!-- Dropdown submenu -->
                            <div id="subMenu-<?php echo esc_attr($key); ?>"
                                class="subMenu hidden absolute right-0 top-full translate-y-5 pt-2 bg-black/20 backdrop-blur-[10px] shadow-xl rounded-lg p-4 min-w-[300px] space-y-2 z-50">
                                <ul>
                                    <?php foreach ($menu['items'] as $item) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($item['link']); ?>"
                                            class="block text-sm capitalize text-white hover:text-primary">
                                            <?php echo esc_html($item['title']); ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden lg:!hidden bg-white px-4 pt-5">
                <ul class="space-y-3 h-full overflow-y-scroll">
                    <?php foreach ($megaMenus as $key => $menu) : ?>
                    <li class="flex flex-col">
                        <span class="flex">
                            <a href="<?php echo esc_url($menu['link']); ?>"
                                class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary flex items-center justify-between">
                                <?php echo esc_html($menu['title']); ?>
                            </a>
                            <?php if (!empty($menu['groups'])) : ?>
                            <i class="fa fa-chevron-down ml-2" aria-hidden="true"></i>
                            <?php endif; ?>
                        </span>

                        <?php if (!empty($menu['groups'])) : ?>
                        <div class="mobileMegaContent hidden px-2 pt-2 space-y-2">
                            <?php foreach ($menu['groups'] as $groupName => $groupData) : ?>
                            <div>
                                <ul class="space-y-2 list-none">
                                    <li>
                                        <a href="<?php echo esc_url($groupData['link']); ?>"
                                            class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary">
                                            <?php echo esc_html($groupName); ?>
                                        </a>
                                        <?php if (!empty($groupData['items'])) : ?>
                                        <ul class="pt-2 px-2 space-y-2 list-none">
                                            <?php foreach ($groupData['items'] as $item) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($item['link']); ?>"
                                                    class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary">
                                                    <?php echo esc_html($item['title']); ?>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Desktop Mega Menus -->
            <?php foreach ($megaMenus as $key => $menu) : ?>
            <?php if (!empty($menu['groups'])) : ?>
            <div id="megaMenu-<?php echo esc_attr($key); ?>"
                class="megaMenu hidden lg:absolute left-1/2 -translate-x-1/2 2xl:top-[74px] top-[75px] hale_container mx-auto z-50 overflow-y-auto min-h-fit h-full">
                <div
                    class="mx-auto !px-0 grid grid-cols-3 hale_container gap-0 rounded-b-2xl shadow-xl bg-black/20 backdrop-blur-[10px]">
                    <!-- Column 1: Parent Groups -->
                    <div class="rounded-bl-2xl">
                        <ul class="space-y-0">
                            <?php $i = 0; ?>
                            <?php foreach ($menu['groups'] as $groupName => $items) : ?>
                            <li class="mainCat flex items-center gap-2 py-2 px-5" data-index="<?php echo esc_attr($i); ?>">
                                <a href="<?php echo esc_url($items['link']); ?>"
                                    class="text-xs capitalize text-white cursor-pointer flex items-center gap-2">
                                    <?php echo esc_html($groupName); ?>
                                </a>
                            </li>
                            <?php $i++; endforeach; ?>
                        </ul>
                    </div>

                    <!-- Column 2: Child Items -->
                    <div class="col-span-2 bg-secondary/30 backdrop-blur-[10px]">
                        <?php $i = 0; ?>
                        <?php foreach ($menu['groups'] as $groupData) : ?>
                        <div class="hidden childGroups" data-group="<?php echo esc_attr($i); ?>">
                            <ul class="space-y-0">
                                <?php foreach ($groupData['items'] as $item) : ?>
                                <li class="py-1 px-5">
                                    <a href="<?php echo esc_url($item['link']); ?>"
                                        class="text-xs capitalize text-white hover:text-primary">
                                        <?php echo esc_html($item['title']); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </header>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ----------------------------
            // Desktop navigation
            // ----------------------------
            const desktopNav = document.getElementById('desktopNav');

            if (desktopNav) {
                const navItems = desktopNav.querySelectorAll('li');
                const megaMenus = document.querySelectorAll('.megaMenu');
                const subMenus = document.querySelectorAll('.subMenu');

                const clearActive = () => {
                    navItems.forEach(item => item.querySelector('a')?.classList.remove('main_active'));
                };

                const closeAllMenus = () => {
                    megaMenus.forEach(menu => menu.classList.add('hidden'));
                    subMenus.forEach(menu => menu.classList.add('hidden'));
                    clearActive();
                };

                navItems.forEach(item => {
                    const megaMenu = item.dataset.megaTarget ? document.getElementById(item.dataset.megaTarget) : null;
                    const subMenu = item.dataset.subTarget ? document.getElementById(item.dataset.subTarget) : null;
                    const link = item.querySelector('a');

                    item.addEventListener('mouseenter', () => {
                        closeAllMenus();
                        megaMenu?.classList.remove('hidden');
                        subMenu?.classList.remove('hidden');
                        link?.classList.add('main_active');
                    });
                });

                // Close a menu when the pointer leaves it
                document.querySelectorAll('.subMenu, .megaMenu').forEach(menu => {
                    menu.addEventListener('mouseleave', () => {
                        menu.classList.add('hidden');
                        clearActive();
                    });
                });

                // Mega menu column switching (groups and items)
                megaMenus.forEach(menu => {
                    const parents = menu.querySelectorAll('.mainCat');
                    const groups = menu.querySelectorAll('.childGroups');
                    const arrow = document.createElement('i');
                    arrow.className = 'fa-solid fa-arrow-up-right-from-square ml-2';

                    if (parents.length) {
                        parents[0].classList.add('active');
                        parents[0].querySelector('a')?.appendChild(arrow);
                        groups[0]?.classList.remove('hidden');
                    }

                    parents.forEach(parent => {
                        parent.addEventListener('mouseenter', () => {
                            const index = parent.dataset.index;

                            groups.forEach(group => group.classList.add('hidden'));
                            parents.forEach(p => p.classList.remove('active'));

                            menu.querySelector(`[data-group="${index}"]`)?.classList.remove('hidden');

                            parent.classList.add('active');
                            parent.querySelector('a')?.appendChild(arrow);
                        });
                    });
                });
            }

            // ----------------------------
            // Mobile menu
            // ----------------------------
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeIcon = document.getElementById('closeIcon');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    const isClosed = mobileMenu.classList.toggle('hidden');

                    hamburgerIcon?.classList.toggle('hidden', !isClosed);
                    closeIcon?.classList.toggle('hidden', isClosed);
                    mobileMenuBtn.setAttribute('aria-expanded', String(!isClosed));
                });

                // Accordion: one open submenu at a time
                const mobileMenuItems = mobileMenu.querySelectorAll(':scope > ul > li');

                mobileMenuItems.forEach(li => {
                    const toggleIcon = li.querySelector('i.fa-chevron-down');
                    const content = li.querySelector('.mobileMegaContent');

                    if (!toggleIcon || !content) return;

                    toggleIcon.addEventListener('click', () => {
                        mobileMenuItems.forEach(otherLi => {
                            const otherContent = otherLi.querySelector('.mobileMegaContent');
                            if (otherContent && otherContent !== content) {
                                otherContent.classList.add('hidden');
                            }
                        });

                        content.classList.toggle('hidden');
                    });
                });
            }
        });

        // ----------------------------
        // Live product search
        // ----------------------------
        jQuery(document).ready(function ($) {
            $('#live-search').on('keyup', function () {
                const keyword = $(this).val();

                if (keyword.length < 2) {
                    $('#live-search-results').addClass('hidden').html('');
                    return;
                }

                $.ajax({
                    url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
                    type: 'POST',
                    data: {
                        action: 'live_search_products',
                        keyword: keyword
                    },
                    success: function (res) {
                        $('#live-search-results').removeClass('hidden').html(res);
                    }
                });
            });
        });
        </script>

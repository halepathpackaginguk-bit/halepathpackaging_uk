<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular())
        wp_enqueue_script('comment-reply'); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/output.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css" />
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri(); ?>/assets/slick-theme.css" />
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="vxJVqkHpw-YU0K97Hbs-wFEVtQhadmF2d19hVFWCuSU" />
    <meta name="trustpilot-one-time-domain-verification-id" content="ae39cbe4-c17f-458d-ad5d-f78d10d14bdd" />

</head>
<?php
$megaMenus = require get_template_directory() . '/inc/mega-menu.php';
?>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo"
                            height="60" width="60" />
                    </a>
                </div>
                <!-- Navigation -->
                <nav class="lg:w-full w-1/2 flex lg:justify-center justify-end items-center">
                    <button id="mobileMenuBtn" class="lg:hidden">
                        <svg id="mobileMenuIcon" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <!-- Hamburger -->
                            <path id="hamburgerIcon" stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16" />

                            <!-- Close -->
                            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <ul id="desktopNav" class="hidden lg:flex gap-1.5 justify-between w-full">
                        <?php foreach ($megaMenus as $key => $menu): ?>
                        <?php
                            $isMega = !empty($menu['groups']);
                            $isDropdown = empty($menu['groups']) && !empty($menu['items']);
                            ?>
                        <li class="relative cursor-pointer flex items-center" <?php if ($isMega): ?>
                            data-mega-target="megaMenu-<?php echo $key; ?>" <?php endif; ?> <?php if ($isDropdown): ?>
                            data-sub-target="subMenu-<?php echo $key; ?>" <?php endif; ?>>

                            <a href="<?php echo esc_url($menu['link']); ?>"
                                class="text-sm font-normal capitalize text-title_Clr hover:text-white hover:bg-secondary px-2 py-2 rounded-[30px] flex items-center">
                                <?php echo $menu['title']; ?>
                                <?php if ($isMega || $isDropdown): ?>
                                <i class="fa fa-chevron-down ml-1.5"></i>
                                <?php endif; ?>
                            </a>
                            <!-- subMenu Menus -->
                            <?php if ($isDropdown): ?>
                            <div id="subMenu-<?php echo $key; ?>"
                                class="subMenu hidden absolute right-0 top-full translate-y-5 pt-2 bg-black/20 backdrop-blur-[10px] shadow-xl rounded-lg p-4 min-w-[300px] space-y-2 z-50">
                                <ul>
                                    <?php foreach ($menu['items'] as $item): ?>
                                    <li>
                                        <a href="<?php echo esc_url($item['link']); ?>"
                                            class="block text-sm capitalize text-white hover:text-primary">
                                            <?php echo $item['title']; ?>
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




            <?php if (wp_is_mobile()) : ?>
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden lg:!hidden bg-white px-4 pt-5" >
                <ul class="space-y-3 h-full overflow-y-scroll">
                    <?php foreach ($megaMenus as $key => $menu): ?>
                    <li class="flex flex-col">
                        <span class="flex">
                            <a href="<?php echo esc_url($menu['link']); ?>"
                                class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary flex items-center justify-between">
                                <?php echo $menu['title']; ?>

                            </a>
                            <?php if (!empty($menu['groups'])): ?>
                            <i class="fa fa-chevron-down ml-2"></i>
                            <?php endif; ?>
                        </span>
                        <?php if (!empty($menu['groups'])): ?>
                        <div class="mobileMegaContent hidden px-2 pt-2 space-y-2">
                            <?php foreach ($menu['groups'] as $groupName => $groupData): ?>
                            <div>
                                <ul class="space-y-2 list-none">
                                    <li>
                                        <a href="<?php echo esc_url($groupData['link']); ?>"
                                            class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary">
                                            <?php echo $groupName; ?>
                                        </a>
                                        <?php if (!empty($groupData['items'])): ?>
                                        <ul class="pt-2 px-2 space-y-2 list-none">
                                            <?php foreach ($groupData['items'] as $item): ?>
                                            <li>
                                                <a href="<?php echo esc_url($item['link']); ?>"
                                                    class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary">
                                                    <?php echo $item['title']; ?>
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

            <?php else : ?>
            <!-- Desktop Mega Menus -->
            <?php foreach ($megaMenus as $key => $menu): ?>
            <?php if (!empty($menu['groups'])): ?>
            <div id="megaMenu-<?php echo $key; ?>"
                class="megaMenu hidden lg:absolute left-1/2 -translate-x-1/2 2xl:top-[74px]  top-[94px] hale_container mx-auto  z-50 overflow-y-auto min-h-fit h-full">
                <?php
                        $hasImage = false;

                        foreach ($menu['groups'] as $groupName => $items) {
                            if (!empty($items['image']) && $items['image'] === true) {
                                $hasImage = true;
                                break;
                            }
                        }
                        ?>
                <div
                    class="mx-auto !px-0 grid <?php echo $hasImage ? 'grid-cols-4 hale_container' : 'grid-cols-4 hale_container'; ?> gap-0 rounded-b-2xl shadow-xl bg-black/20 backdrop-blur-[10px]">
                    <!-- Column 1: Parent Groups -->
                    <div class="rounded-bl-2xl ">
                        <ul class="space-y-0">
                            <?php $i = 0; ?>
                            <?php foreach ($menu['groups'] as $groupName => $items): ?>
                            <li class="mainCat flex items-center gap-2 py-2 px-5 " data-index="<?php echo $i; ?>">
                                <a href="<?php echo esc_url($items['link']); ?>"
                                    class="text-xs capitalize text-white cursor-pointer flex items-center gap-2">
                                    <?php echo $groupName; ?>
                                </a>
                            </li>
                            <?php $i++; endforeach; ?>
                        </ul>
                    </div>
                    <!-- Column 2: Child Items -->
                    <div class="col-span-1 bg-secondary/30 backdrop-blur-[10px]">
                        <?php $i = 0;
                                foreach ($menu['groups'] as $groupName => $groupData): ?>
                        <div class="hidden childGroups" data-group="<?php echo $i; ?>">
                            <ul class="space-y-0">
                                <?php foreach ($groupData['items'] as $item): ?>
                                <li class="py-1 px-5">
                                    <a href="<?php echo esc_url($item['link']); ?>"
                                        class="text-xs capitalize text-white hover:text-primary">
                                        <?php echo $item['title']; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                    <!-- Column 3: Images -->
                    <?php if ($hasImage): ?>
                    <div class="col-span-2 py-4 px-6">
                        <?php $i = 0; ?>
                        <?php foreach ($menu['groups'] as $groupName => $items): ?>
                        <?php if (!empty($items['image']) && $items['image'] === true): ?>
                        <div class="hidden menuImage rounded-lg grid grid-cols-5 gap-4" data-image="<?php echo $i; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product/boxgal4.png"
                                class="rounded-2xl !h-full w-full object-cover col-span-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product/boxgal5.png"
                                class="rounded-2xl h-full w-full object-cover col-span-3">
                        </div>
                        <?php endif; ?>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </header>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const desktopNav = document.getElementById('desktopNav');
            const allNavItems = desktopNav.querySelectorAll('li');
            const allMegaMenus = document.querySelectorAll('.megaMenu');
            const allSubMenus = document.querySelectorAll('.subMenu');

            function closeAllMenus() {
                allMegaMenus.forEach(menu => menu.classList.add('hidden'));
                allSubMenus.forEach(menu => menu.classList.add('hidden'));
                allNavItems.forEach(nav => {
                    nav.querySelector('a')?.classList.remove('main_active');
                });
            }
            allNavItems.forEach(item => {

                const megaTarget = item.dataset.megaTarget;
                const subTarget = item.dataset.subTarget;

                const megaMenu = megaTarget ? document.getElementById(megaTarget) : null;
                const subMenu = subTarget ? document.getElementById(subTarget) : null;

                const link = item.querySelector('a');

                item.addEventListener('mouseenter', () => {

                    closeAllMenus();

                    if (megaMenu) megaMenu.classList.remove('hidden');
                    if (subMenu) subMenu.classList.remove('hidden');

                    link?.classList.add('main_active');
                });
            });
            allSubMenus.forEach(menu => {
                menu.addEventListener('mouseleave', () => {

                    menu.classList.add('hidden');

                    allNavItems.forEach(nav => {
                        nav.querySelector('a')?.classList.remove('main_active');
                    });
                });
            });
            allMegaMenus.forEach(menu => {
                menu.addEventListener('mouseleave', () => {

                    menu.classList.add('hidden');

                    allNavItems.forEach(nav => {
                        nav.querySelector('a')?.classList.remove('main_active');
                    });
                });
            });
            allMegaMenus.forEach(menu => {
                const parents = menu.querySelectorAll('.mainCat');
                const groups = menu.querySelectorAll('.childGroups');
                const images = menu.querySelectorAll('.menuImage');
                const arrow = document.createElement('i');
                arrow.className = 'fa-solid fa-arrow-up-right-from-square ml-2';

                // Default first active
                if (parents.length > 0) {

                    parents[0].classList.add('active');
                    parents[0].querySelector('a')?.appendChild(arrow);

                    groups[0]?.classList.remove('hidden');
                    images[0]?.classList.remove('hidden');
                }

                parents.forEach(p => {

                    p.addEventListener('mouseenter', () => {

                        const index = p.dataset.index;

                        // Hide all
                        groups.forEach(g => g.classList.add('hidden'));
                        images.forEach(img => img.classList.add('hidden'));
                        parents.forEach(pr => pr.classList.remove('active'));

                        // Show selected
                        menu.querySelector(`[data-group="${index}"]`)?.classList.remove(
                            'hidden');
                        menu.querySelector(`[data-image="${index}"]`)?.classList.remove(
                            'hidden');

                        p.classList.add('active');
                        p.querySelector('a')?.appendChild(arrow);
                    });

                });

            });

        });

        
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeIcon = document.getElementById('closeIcon');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    hamburgerIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });
            }
            // Mobile Mega Toggle
            const mobileMenuItems = document.querySelectorAll('#mobileMenu > ul > li');
            mobileMenuItems.forEach(li => {
                const toggleIcon = li.querySelector('i.fa-chevron-down');
                const content = li.querySelector('.mobileMegaContent');

                if (toggleIcon && content) {
                    toggleIcon.addEventListener('click', () => {

                        // Close others
                        mobileMenuItems.forEach(otherLi => {
                            const otherContent = otherLi.querySelector(
                                '.mobileMegaContent');
                            if (otherContent && otherContent !== content) {
                                otherContent.classList.add('hidden');
                            }
                        });

                        content.classList.toggle('hidden');
                    });
                }

            });

        });
        jQuery(document).ready(function($) {
            $('#live-search').on('keyup', function() {
                var keyword = $(this).val();
                if (keyword.length < 2) {
                    $('#live-search-results').addClass('hidden').html('');
                    return;
                }
                $.ajax({
                    url: '<?php echo admin_url("admin-ajax.php"); ?>',
                    type: 'POST',
                    data: {
                        action: 'live_search_products',
                        keyword: keyword
                    },
                    success: function(res) {
                        $('#live-search-results').removeClass('hidden').html(res);
                    }
                });
            });
        });
        </script>

<?php
$about_sec = get_field('about_section');
$about_content = $about_sec['content'] ?? '';
$btn_link = $about_sec['aboutlink'] ?? '';
if ($about_content) {
    $about_content = str_replace('<p>', '<p class="slide_txt">', $about_content);
}
?>

<?php
$images = [
    get_template_directory_uri() . '/assets/images/slid1.jpeg',
    get_template_directory_uri() . '/assets/images/slid2.jpeg',
    get_template_directory_uri() . '/assets/images/slid3.jpeg',
];
?>


<section class="py-10 md:py-12">
    <div class="mx-auto container px-4">
        <div class="grid grid-cols-1 items-center gap-8 md:grid-cols-2 lg:gap-10">

            <!-- Left Image -->
            <div class="overflow-hidden rounded-[24px]">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/slid1.jpeg'); ?>"
                    alt="Custom printed packaging boxes and pouches" class="h-[300px] w-full object-cover lg:h-full"
                    loading="lazy">
            </div>

            <!-- Right Content -->
            <div class="py-1">
                <h6 class="sub_title">
                    About All Custom Packaging
                    <div class="sub_title_line"></div>
                </h6>
                <!-- Heading -->
                <h2 class="h2 md:!text-left text-center">
                    All Custom Packaging - The UK's Trusted Custom Packaging Supplier
                </h2>

                <!-- Description -->
                <p class="mb-4 text-sm">
                    We are one of the leading custom packaging suppliers in the UK, with years of experience and modern
                    manufacturing technology to meet the packaging needs of businesses of all sizes. We are committed to
                    delivering the best packaging solutions, every time.
                </p>

                <!-- Features -->
                <ul class="mb-6 space-y-2">
                    <li class="flex items-start gap-2.5 text-sm font-semibold leading-5">
                        <span
                            class="mt-0.5 flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-[#f9d9c4] text-[13px] font-bold text-[#236273]">✓</span>
                        <span>Free expert design support.</span>
                    </li>

                    <li class="flex items-start gap-2.5 text-sm font-semibold leading-5">
                        <span
                            class="mt-0.5 flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-[#f9d9c4] text-[13px] font-bold text-[#236273]">✓</span>
                        <span>Full-colour printing and custom sizing.</span>
                    </li>

                    <li class="flex items-start gap-2.5 text-sm font-semibold leading-5">
                        <span
                            class="mt-0.5 flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-[#f9d9c4] text-[13px] font-bold text-[#236273]">✓</span>
                        <span>Eco-friendly and premium materials.</span>
                    </li>

                    <li class="flex items-start gap-2.5 text-sm font-semibold leading-5">
                        <span
                            class="mt-0.5 flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-[#f9d9c4] text-[13px] font-bold text-[#236273]">✓</span>
                        <span>Fast turnaround time and free UK delivery.</span>
                    </li>
                </ul>

                <!-- Button -->
                <a href="<?php echo esc_url(home_url('/about-us/')); ?>"
                    class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit">
                    About Us
                    <span aria-hidden="true">→</span>
                </a>

            </div>
        </div>
    </div>
</section>
<section class="py-10">
    <div class="hale_container flex flex-col justify-center items-center">
        <h2 class="h2">
            Available Worldwide
        </h2>
        <!-- FAQs -->
        <div id="avail_faqs" class="pt-8">
            <div class="max-w-[1080px] mt-10 grid gap-5 md:grid-cols-1 grid-cols-1 mx-auto">
                <div class="avail-faq-item border border-primary rounded-xl">
                    <h3 class="avail-faq-title w-full flex items-center justify-between md:px-8 px-4 md:py-5.5 py-3">
                        <span class="text-lg font-normal text-title_Clr">
                            United Kingdom
                            <span class="text-xs font-normal text-primary">
                                England, Scotland, Wales & Northern Ireland
                            </span>
                        </span>
                        <span class="text-xl">
                            <i class="fa fa-chevron-down text-primary transition-transform duration-300"></i>
                        </span>
                    </h3>
                    <div
                         class="avail-faq-content max-h-[450px] overflow-hidden transition-all duration-200 border-t border-primary">
                        <div class="md:px-8 px-4 md:py-5.5 py-3 grid md:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    England
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    Greater London, Manchester, Birmingham, Liverpool, Leeds, Sheffield, Bristol,
                                    Newcastle, Nottingham, Leicester, Southampton, Oxford, Cambridge and surrounding
                                    areas.
                                </p>
                            </div>

                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    Scotland
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    Edinburgh, Glasgow, Aberdeen, Dundee, Inverness, Perth, Stirling and surrounding
                                    areas.
                                </p>
                            </div>

                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    Wales
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    Cardiff, Swansea, Newport, Wrexham, Bangor and surrounding areas.
                                </p>
                            </div>

                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    Northern Ireland
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    Belfast, Derry/Londonderry, Lisburn, Newry, Armagh and surrounding areas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="avail-faq-item border border-primary rounded-xl">
                    <h3 class="avail-faq-title w-full flex items-center justify-between md:px-8 px-4 md:py-5.5 py-3">
                        <span class="text-lg font-normal text-title_Clr">
                            International
                            <span class="text-xs font-normal text-primary">
                                Serving customers across Europe, Asia, the Americas, Africa & Oceania
                            </span>
                        </span>
                        <span class="text-xl">
                            <i class="fa fa-chevron-down text-primary transition-transform duration-300"></i>
                        </span>
                    </h3>
                    <div
                        class="avail-faq-content max-h-0 overflow-hidden transition-all duration-200 border-t-0 border-primary ">
                        <div class="md:px-8 px-4 md:py-5.5 py-3 grid md:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    Europe
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    France, Germany, Spain, Italy, Netherlands, Belgium, Ireland, Switzerland, Sweden,
                                    Norway, Denmark and more.
                                </p>
                            </div>

                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    North America
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    Canada, Mexico, Jamaica, Bahamas, Costa Rica and more.
                                </p>
                            </div>

                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    Asia-Pacific
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    Australia, New Zealand, Singapore, Japan, South Korea, India, Malaysia, Thailand and
                                    more.
                                </p>
                            </div>

                            <div>
                                <h4 class="text-base font-normal text-title_Clr mb-3">
                                    Middle East & Africa
                                </h4>
                                <p class="text-sm font-normal text-txt_Clr">
                                    United Arab Emirates, Saudi Arabia, Qatar, South Africa, Kenya, Nigeria and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.avail-faq-title').on('click', function () {
            var parent = $(this).closest('.avail-faq-item');
            var content = parent.find('.avail-faq-content');
            var icon = $(this).find('i');

            // Close other FAQs
            $('.avail-faq-item')
                .not(parent)
                .find('.avail-faq-content')
                .removeClass('max-h-[450px] border-t')
                .addClass('max-h-0 border-t-0');

            // Reset other icons
            $('.avail-faq-item')
                .not(parent)
                .find('i')
                .removeClass('rotate-180');

            // Toggle current FAQ
            if (content.hasClass('max-h-0')) {
                content
                    .removeClass('max-h-0 border-t-0')
                    .addClass('max-h-[450px] border-t');

                icon.addClass('rotate-180');
            } else {
                content
                    .removeClass('max-h-[450px] border-t')
                    .addClass('max-h-0 border-t-0');

                icon.removeClass('rotate-180');
            }
        });
    });  
</script>
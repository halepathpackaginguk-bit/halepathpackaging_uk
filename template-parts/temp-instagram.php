
<section class="bg-[#EAF6F9] py-14 px-4">
    <h2 class="h2">
        Instagram Posts
    </h2>
    <div class="mt-9 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 items-center">

        <!-- Next 4 Images -->
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-page/o<?php echo $i; ?>.png"
                alt="Instagram Post <?php echo $i + 1; ?>" class="w-full" />
        </div>
        <?php endfor; ?>
    </div>
</section>
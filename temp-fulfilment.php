<?php
/** Template Name: Amazon Fulfilment */
get_header();
?>

<main>
    <section class="py-16">
        <div class="hale_container">
            <ul class="flex items-center gap-1 text-xs font-medium mb-8">
                <li>
                    <a href="/" class="text-primary hover:text-secondary">
                        Home
                    </a>
                </li>
                <li>›
                </li>
                <li class="text-secondary">
                    UK Amazon Fulfilment
                </li>
            </ul>
            <h1 class="text-4xl text-2xl font-bold text-title_Clr mb-4">
                <?php
                the_title();
                ?>
            </h1>
        </div>
        <div class="hale_container page_content">
            <?php
            the_content();
            ?>
        </div>
    </section>
    <section class="pb-16">
        <div class="hale_container flex items-center justify-center gap-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/certi1.png" alt="certi1" class="" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/certi2.png" alt="certi2" class="" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/certi3.png" alt="certi3" class="" />
        </div>
    </section>
</main>
<?php

get_footer();
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

<section class="max_content mt-14 py-8">
    <div class="hale_container hale_flex !flex-row items-start!">
        <!-- LEFT: IMAGES -->
        <div class="md:w-2/5 relative w-1/2">
            <div class="overflow-hidden sm:h-[400px] h-[220px]" id="imageContainer">
                <?php foreach ($images as $index => $img): ?>
                    <figure class="image-slide  <?php echo $index === 0 ? 'block' : 'hidden'; ?>"
                        data-index="<?php echo $index; ?>">
                        <img src="<?php echo esc_url($img); ?>" alt="Image <?php echo $index + 1; ?>" class="rounded_img" />
                    </figure>
                <?php endforeach; ?>

                <!-- BACKGROUND SHADOW IMAGES -->
                <figure>
                    <img src="<?php echo esc_url($images[0]); ?>" class="w-[80%] -top-10 fixed_img" alt="" />
                </figure>

                <figure>
                    <img src="<?php echo esc_url($images[1]); ?>" class="w-[90%] -top-5 fixed_img" alt="" />
                </figure>
            </div>

            <div class="sm:mt-10 mt-5 flex justify-center">
                <a href="<?php echo esc_url($btn_link); ?>" class="btn_secondry">
                    About Us
                </a>
            </div>
        </div>
        <!-- RIGHT: SCROLL TEXT -->
        <div class="relative md:w-3/5 w-1/2">
            <div id="scrollText" class="w-full sm:max-h-[400px] max-h-[220px] overflow-y-scroll scroll_Left">
                <p> <?php echo $about_content; ?></p>
            </div>

            <div class="slide_text_overlay">
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollBox = document.getElementById('scrollText');
        const images = document.querySelectorAll('.image-slide');

        if (!scrollBox || images.length === 0) return;

        scrollBox.addEventListener('scroll', function () {
            const scrollTop = scrollBox.scrollTop;
            const scrollHeight = scrollBox.scrollHeight - scrollBox.clientHeight;
            const totalImages = images.length;

            let index = Math.floor((scrollTop / scrollHeight) * totalImages);
            index = Math.min(totalImages - 1, index);

            images.forEach((img, i) => {
                img.classList.toggle('hidden', i !== index);
                img.classList.toggle('block', i === index);
            });
        });
    });
</script>
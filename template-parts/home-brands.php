<section class="overflow-hidden py-5 bg-[#f5f5f5]">
    <div class="mx-auto w-full container px-4">
        <div class="brand-slider">

            <?php
            $brands = [
                [
                    'name' => 'Perrin',
                    'logo' => '/assets/images/brands/1.png',
                ],
                [
                    'name' => 'StellaTerra',
                    'logo' => '/assets/images/brands/2.png',
                ],
                [
                    'name' => "Mozart's",
                    'logo' => '/assets/images/brands/3.png',
                ],
                [
                    'name' => 'Brooke Lane Design',
                    'logo' => '/assets/images/brands/4.png',
                ],
                [
                    'name' => 'Everlast Epoxy',
                    'logo' => '/assets/images/brands/5.png',
                ],
                [
                    'name' => 'Verdant Vitality',
                    'logo' => '/assets/images/brands/6.svg',
                ],
                [
                    'name' => 'Cheese',
                    'logo' => '/assets/images/brands/7.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/8.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/9.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/10.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/11.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/12.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/13.svg',
                ],
                [
                    'name' => 'One More',
                    'logo' => '/assets/images/brands/14.svg',
                ],
            ];

            foreach ($brands as $brand):
                ?>
                <div class="px-2.5">
                    <div class="flex h-[66px] items-center justify-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . $brand['logo']); ?>"
                            alt="<?php echo esc_attr($brand['name']); ?>"
                            class="block max-h-[44px] w-full max-w-[150px] object-contain" loading="lazy">
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
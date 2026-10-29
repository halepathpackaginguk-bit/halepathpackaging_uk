<?php
$client_stories = [
    [
        'image' => get_template_directory_uri() . '/assets/images/team/teammain.png',
        'video' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_1?autoplay=1',
        'alt' => 'Customer showing custom packaging',
    ],
    [
        'image' => get_template_directory_uri() . '/assets/images/team/team1.png',
        'video' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_2?autoplay=1',
        'alt' => 'Customer unboxing custom packaging',
    ],
    [
        'image' => get_template_directory_uri() . '/assets/images/team/team2.png',
        'video' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_3?autoplay=1',
        'alt' => 'Customer enjoying packaging delivery',
    ],
    [
        'image' => get_template_directory_uri() . '/assets/images/team/team3.png',
        'video' => 'https://www.youtube.com/embed/YOUR_VIDEO_ID_4?autoplay=1',
        'alt' => 'Customer sharing a success story',
    ],
];
?>

<section class="relative isolate mx-auto my-5 max-w-[1500px] overflow-hidden rounded-[28px] bg-[#102638] text-white">

    <!-- Decorative teal shapes -->
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -right-40 -top-36 h-[650px] w-[650px] rounded-full bg-[#087d88]"></div>

        <div
            class="absolute -bottom-[480px] left-[18%] h-[680px] w-[1000px] rotate-[-25deg] rounded-[50%] bg-[#087d88]">
        </div>

        <div class="absolute right-0 top-0 h-full w-[40%] bg-gradient-to-l from-[#087d88]/40 to-transparent"></div>
    </div>

    <div
        class="relative grid min-h-[530px] grid-cols-1 items-center gap-8 px-6 py-12 sm:px-10 lg:grid-cols-12 lg:gap-5 lg:px-9 lg:py-12">

        <!-- LEFT CONTENT -->
        <div class="relative z-10 lg:col-span-5">

            <p class="mb-4 text-sm font-bold uppercase tracking-wide sm:text-base">
                Client Success Stories,
            </p>

            <h2 class="mb-7 text-xl font-bold leading-snug sm:text-2xl">
                Grow Faster with Packaging That Performs.
            </h2>

            <div class="max-w-xl space-y-4 text-sm leading-6 text-white/90 sm:text-base">
                <p>
                    We help UK brands stand out with custom packaging that combines quality,
                    speed, and impact. From startups to established businesses, our solutions
                    are built to protect products, boost shelf appeal, and drive real results.
                </p>

                <p>
                    Your success is our priority - and our packaging proves it.
                </p>
            </div>

            <a href="<?php echo esc_url(home_url('/client-stories/')); ?>"
                class="mt-5 inline-block rounded bg-[#5bc7d2] px-4 py-1.5 text-sm font-semibold text-[#102638] transition hover:bg-white">
                Explore More
            </a>

            <!-- BENEFITS -->
            <ul class="mt-5 space-y-1.5 text-sm font-semibold leading-snug sm:text-base">
                <li class="flex items-start gap-2">
                    <span class="text-xl leading-5 text-[#5bc7d2]">✓</span>
                    <span>Premium quality materials &amp; flawless printing</span>
                </li>

                <li class="flex items-start gap-2">
                    <span class="text-xl leading-5 text-[#5bc7d2]">✓</span>
                    <span>Fully customised designs tailored to your brand</span>
                </li>

                <li class="flex items-start gap-2">
                    <span class="text-xl leading-5 text-[#5bc7d2]">✓</span>
                    <span>Fast turnaround with reliable UK delivery</span>
                </li>

                <li class="flex items-start gap-2">
                    <span class="text-xl leading-5 text-[#5bc7d2]">✓</span>
                    <span>Eco-friendly &amp; sustainable packaging options</span>
                </li>

                <li class="flex items-start gap-2">
                    <span class="text-xl leading-5 text-[#5bc7d2]">✓</span>
                    <span>Low minimum order quantities for growing businesses</span>
                </li>
            </ul>
        </div>

        <!-- RIGHT VIDEO THUMBNAILS -->
        <div class="relative z-10 lg:col-span-7 lg:self-start">

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4 sm:gap-3 lg:gap-3">

                <?php foreach ($client_stories as $index => $story): ?>

                    <button type="button"
                        class="group relative aspect-[3/4] w-full overflow-hidden rounded-xl bg-black/30 shadow-lg focus:outline-none focus-visible:ring-4 focus-visible:ring-[#5bc7d2]"
                        data-client-video="<?php echo esc_url($story['video']); ?>"
                        aria-label="<?php echo esc_attr('Play video: ' . $story['alt']); ?>">
                        <img src="<?php echo esc_url($story['image']); ?>" alt="<?php echo esc_attr($story['alt']); ?>"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-110" loading="lazy">

                        <!-- Hover overlay -->
                        <span class="absolute inset-0 bg-black/10 transition group-hover:bg-black/40"></span>

                        <!-- Play button -->
                        <span class="absolute inset-0 flex items-center justify-center">
                            <span
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-[#102638] shadow-lg transition duration-300 group-hover:scale-110 group-hover:bg-[#5bc7d2]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="ml-1 h-6 w-6" aria-hidden="true">
                                    <path
                                        d="M7 4.5a1 1 0 0 1 1.5-.86l11 7.5a1 1 0 0 1 0 1.72l-11 7.5A1 1 0 0 1 7 19.5v-15Z" />
                                </svg>
                            </span>
                        </span>
                    </button>

                <?php endforeach; ?>

            </div>
        </div>

    </div>
</section>

<!-- VIDEO MODAL -->
<div id="clientVideoModal" class="fixed inset-0 z-[99999] hidden items-center justify-center bg-black/90 p-4"
    role="dialog" aria-modal="true" aria-label="Customer success story video">
    <button type="button" id="closeClientVideo"
        class="absolute right-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-3xl text-white transition hover:bg-white/20"
        aria-label="Close video">
        &times;
    </button>

    <div class="relative w-full max-w-4xl overflow-hidden rounded-xl bg-black">
        <div class="aspect-video">
            <iframe id="clientVideoIframe" class="hidden h-full w-full" src="" title="Customer success story"
                allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe>

            <video id="clientVideoPlayer" class="hidden h-full w-full" controls playsinline preload="none"></video>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('clientVideoModal');
        const closeButton = document.getElementById('closeClientVideo');
        const iframe = document.getElementById('clientVideoIframe');
        const video = document.getElementById('clientVideoPlayer');
        const triggers = document.querySelectorAll('[data-client-video]');

        function closeVideo() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');

            iframe.src = '';
            iframe.classList.add('hidden');

            video.pause();
            video.removeAttribute('src');
            video.load();
            video.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');
        }

        triggers.forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                const videoUrl = trigger.getAttribute('data-client-video');

                if (!videoUrl) return;

                closeVideo();

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');

                if (/\.(mp4|webm|ogg)(\?.*)?$/i.test(videoUrl)) {
                    video.classList.remove('hidden');
                    video.src = videoUrl;
                    video.play().catch(function () { });
                } else {
                    iframe.classList.remove('hidden');
                    iframe.src = videoUrl;
                }
            });
        });

        closeButton.addEventListener('click', closeVideo);

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeVideo();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeVideo();
            }
        });
    });
</script>
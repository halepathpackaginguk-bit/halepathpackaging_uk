(function ($) {
    'use strict';

    var sliderConfigs = {
        '.brand-slider': {
            slidesToShow: 10,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: 'linear',
            infinite: true,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            pauseOnFocus: false,
            draggable: true,
            swipe: true,
            responsive: [
                { breakpoint: 1280, settings: { slidesToShow: 5 } },
                { breakpoint: 1024, settings: { slidesToShow: 4 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 480, settings: { slidesToShow: 2 } }
            ]
        },
        '.cate-slider': {
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: 'linear',
            infinite: true,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            pauseOnFocus: false,
            draggable: true,
            swipe: true,
            responsive: [
                { breakpoint: 1280, settings: { slidesToShow: 5 } },
                { breakpoint: 1024, settings: { slidesToShow: 4 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 480, settings: { slidesToShow: 2 } }
            ]
        },
        '.noissue': {
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: 'linear',
            infinite: false,
            arrows: true,
            dots: false,
            pauseOnHover: true,
            pauseOnFocus: false,
            draggable: true,
            swipe: true,
            responsive: [
                { breakpoint: 1280, settings: { slidesToShow: 4 } },
                { breakpoint: 1024, settings: { slidesToShow: 4 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 480, settings: { slidesToShow: 2 } }
            ]
        },
        '.popular': {
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: 'linear',
            infinite: false,
            arrows: true,
            dots: false,
            pauseOnHover: true,
            pauseOnFocus: false,
            draggable: true,
            swipe: true,
            responsive: [
                { breakpoint: 1280, settings: { slidesToShow: 4 } },
                { breakpoint: 1024, settings: { slidesToShow: 4 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 480, settings: { slidesToShow: 2 } }
            ]
        },
        '.readytoship': {
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: 'linear',
            infinite: false,
            arrows: true,
            dots: false,
            pauseOnHover: true,
            pauseOnFocus: false,
            draggable: true,
            swipe: true,
            responsive: [
                { breakpoint: 1280, settings: { slidesToShow: 4 } },
                { breakpoint: 1024, settings: { slidesToShow: 4 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 480, settings: { slidesToShow: 2 } }
            ]
        },
        // Your new testimonial slider
        '.testi-slider': {
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: 'linear',
            infinite: true,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            pauseOnFocus: false,
            draggable: true,
            swipe: true,
            responsive: [
                { breakpoint: 1280, settings: { slidesToShow: 3 } },
                { breakpoint: 1024, settings: { slidesToShow: 3 } },
                { breakpoint: 768, settings: { slidesToShow: 1 } },
                { breakpoint: 480, settings: { slidesToShow: 1 } }
            ]
        }
    };

    function isVisible($el) {
        var $tab = $el.closest('.tab-content');
        if ($tab.length) {
            return !$tab.hasClass('hidden');
        }
        return $el.is(':visible');
    }

    function initSlider($slider) {
        if (!$slider.length || $slider.hasClass('slick-initialized')) {
            return;
        }

        var config = null;
        $.each(sliderConfigs, function (selector, opts) {
            if ($slider.is(selector)) {
                config = opts;
                return false;
            }
        });

        if (!config) {
            return;
        }

        $slider.slick(config);
    }

    function initVisibleSliders($scope) {
        var $el;
        $scope = $scope || $(document);

        $scope.find(Object.keys(sliderConfigs).join(',')).each(function () {
            $el = $(this);
            if (isVisible($el)) {
                initSlider($el);
            }
        });
    }

    window.HaleSliders = {
        refresh: function (scopeSelector) {
            var $scope = scopeSelector ? $(scopeSelector) : $(document);
            $scope.find(Object.keys(sliderConfigs).join(',')).each(function () {
                var $slider = $(this);
                if (isVisible($slider)) {
                    if ($slider.hasClass('slick-initialized')) {
                        $slider.slick('setPosition');
                    } else {
                        initSlider($slider);
                    }
                }
            });
        }
    };

    $(function () {
        initVisibleSliders($(document));
    });

    $(window).on('load', function () {
        initVisibleSliders($(document));
    });

    $(document).on('click', '.tab-btn', function () {
        var tab = $(this).data('tab');
        if (tab) {
            setTimeout(function () {
                window.HaleSliders.refresh('#' + tab);
            }, 0);
        }
    });
})(jQuery);
(function ($) {
    $(document).ready(function () {
        /* project slider */
        $('.our-latest-projects').slick({
            slidesToShow: 4,
            arrows: true,
            dots: false,
            infinite: true,
            slidesToScroll: 1,
            autoplay: true,
            speed: 1500,
            centerMode: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            ]
        });

        /* testimonial slider */
        $('.slider-testimonial').slick({
            slidesToShow: 3,
            arrows: true,
            dots: false,
            infinite: true,
            slidesToScroll: 1,
            autoplay: true,
            speed: 1500,
            centerMode: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            ]
        });
    });
})(jQuery)
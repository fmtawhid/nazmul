@php
    $sliders = getContent('banner.element');
@endphp

@if ($sliders->isNotEmpty())
    <div class="slider-wrapper overflow-hidden w-100">
        <div class="banner-slider owl-theme owl-carousel">
            @foreach ($sliders as $slider)
                <div class="slide-item">
                    <a href="{{ @$slider->data_values->link }}" class="d-block w-100">
                        <img src="{{ frontendImage('banner', @$slider->data_values->slider, '1920x1080') }}" alt="slider-image" class="img-fluid w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif

@push('script')
    <script>
        (function($) {
            "use strict";
            $(".banner-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                nav: false,
                dots: false,
                animateOut: 'fadeOut'
            });
        })(jQuery);
    </script>
@endpush

@push('style')
    <style>
        body, html {
            margin: 0 !important;
            padding: 0 !important;
        }

        .banner-item img, .slide-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            display: block;
        }

        .slider-wrapper {
            width: 100vw !important;
            height: 100vh !important;
            margin: 0 !important;
            padding: 0 !important;
            position: relative !important;
            left: 50% !important;
            right: 50% !important;
            margin-left: -50vw !important;
            margin-right: -50vw !important;
            z-index: 1;
        }

        .banner-slider {
            height: 100%;
            margin: 0 !important;
            padding: 0 !important;
        }

        .slide-item {
            height: 100%;
            margin: 0 !important;
            padding: 0 !important;
        }

        .slide-item a {
            height: 100%;
            display: block;
        }
    </style>
@endpush

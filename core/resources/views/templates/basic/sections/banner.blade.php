@php
    $content = getContent('banner.content', true);
@endphp

<div class="container banner-container @if (gs('homepage_layout') == 'full_width_banner') single-banner @endif">
    <div class="hero-section mb-60">
        @if (gs('homepage_layout') == 'sidebar_menu')
            @include('Template::partials.left_category_menu', ['limit' => 13])
        @endif

        <div class="hero-slider">
            @include('Template::partials.banner_sliders')
        </div>
    </div>
</div>

@push('style')
    <style>
        .left-site-category {
            height: 100%;
        }
    </style>
@endpush



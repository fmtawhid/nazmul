
@if ($data)
    <div class="my-60">
        <div class="container">
            <div class="section-header left-style">
                <h5 class="title">{{ __($data->title) }}</h5>
            </div>
            <div class="offer-wrapper">
                @if ($data->banner)

                    <div class="offer-banner @if($data->banner && $data->banner_position == 'right') order-1 @endif">
                        <img class="w-100 rounded--5" src="{{ getImage(getFilePath('collection') . '/' . $data->banner, getFileSize('collection')) }}" alt="offer-banner">
                    </div>

                    <div class="product-slider-wrapper">
                        <div class="product-with-banner owl-carousel owl-theme" data-items="2">
                            @foreach ($data->products()->sortByDesc('id')->chunk(2) as $chunk)
                                <div class="offer-product">
                                    @foreach ($chunk as $product)
                                        <x-dynamic-component :component="frontendComponent('product-card')" :product="$product" :showRating="false" :showCartButton="false" />
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="product-wrapper">
                        @foreach ($data->products()->chunk(2) as $chunk)
                            <div class="row">
                                @foreach ($chunk as $product)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <x-dynamic-component :component="frontendComponent('product-card')" :product="$product" />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
@endif

@push('style')
    <style>
        .product-wrapper {
            display: block;
        }

        .product-wrapper .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -12px;
            margin-right: -12px;
        }

        .product-wrapper .col-lg-6,
        .product-wrapper .col-md-6,
        .product-wrapper .col-sm-6 {
            flex: 0 0 50%;
            padding: 12px;
            max-width: 50%;
        }

        .product-wrapper .col-lg-6 > * {
            width: 100%;
        }

        @media (max-width: 991px) {
            .product-wrapper .col-lg-6,
            .product-wrapper .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 575px) {
            .product-wrapper .col-lg-6,
            .product-wrapper .col-md-6,
            .product-wrapper .col-sm-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
@endpush

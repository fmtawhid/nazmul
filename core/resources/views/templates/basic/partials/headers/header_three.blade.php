@php
    $headerThreeKeys = array_keys((array) $headerThree->group);

    $firstLetters = array_map(function ($key) {
        return $key[0];
    }, $headerThreeKeys);

    $layoutClass = 'primary-menu-' . implode('', $firstLetters);

    $headerColor = $headerThree?->background_color ?? gs('base_color');
@endphp

@if (@$headerThree->status == 'on')
    <div class="header-bottom @if (gs('homepage_layout') == 'full_width_banner') without-category @endif">
        <div class="container">
            <div class="row g-0">
                <div class="header-bottom-wrapper {{ $layoutClass }}">

                    <button class="primary-menu-button d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    @foreach ($headerThree->group as $key => $group)
                        @if ($key == 'category_widget' && isset($group->status) && $group->status == 'on')
                            <div class="view-category-wrapper">
                                <div class="view-category">
                                    <div class="menu-category-btn" @if (@$group->background_color) style="background-color: {{ '#' . $group->background_color }}" @endif>
                                        <x-svg.category-icon />
                                        @lang('Categories')
                                    </div>
                                </div>

                                <div class="category-dropdown-menu">
                                    @include('Template::partials.left_category_menu', ['limit' => null])
                                </div>
                            </div>
                        @elseif($key == 'links')
                            @include('Template::partials.menu.site_menu', [
                                'classes' => 'd-flex',
                            ])
                        @endif

                        @if ($key == 'widgets')
                            <div class="action-btn-inner d-flex">
                                @foreach (collect($group)->where('status', 'on') as $widget)
                                    @if ($widget->key == 'cart')
                                        <div class="cart-icon-design">
                                            <button class="button cart-button flex-shrink-0" @disabled(Route::is('cart.page')) @if (@$widget->background_color) style="background-color: {{ '#' . $widget->background_color }} !important" @endif>
                                                <i class="las la-shopping-bag"></i>
                                                <span class="flex-shrink-0">
                                                    <span class="amount d-block">{{ gs('cur_sym') }}<span class="cartSubtotal">0</span></span>
                                                    <span class="items d-block">(<span class="cartItemCount">0</span>) @lang('items')</span>
                                                </span>
                                            </button>
                                        </div>
                                    @elseif($widget->key == 'wishlist' && gs('product_wishlist'))
                                        <div class="cart-icon-design widget--style" @if (@$widget->background_color) style="background-color: {{ '#' . @$widget->background_color }} !important" @endif>
                                            <button class="button wish-button" @disabled(Route::is('wishlist.page')) id="wish-button">
                                                <span class="ico">
                                                    <i class="lar la-heart"></i>
                                                </span>
                                                <span class="wishlist-count ecommerce__is">0</span>
                                            </button>
                                        </div>
                                    @elseif($widget->key == 'compare' && gs('product_compare'))
                                        <div class="cart-icon-design widget--style" @if (@$widget->background_color) style="background-color: {{ '#' . @$widget->background_color }} !important" @endif>
                                            <a href="{{ route('compare.all') }}">
                                                <span class="ico">
                                                    <i class="las la-exchange-alt"></i>
                                                </span>
                                                <span class="compare-count ecommerce__is">0</span>
                                            </a>
                                        </div>
                                    @elseif($widget->key == 'user_auth')
                                        <div class="h-100 d-flex align-items-center" @if (@$widget->background_color) style="background-color: {{ '#' . @$widget->background_color }} !important" @endif>
                                            @include('Template::partials.user_auth_options')
                                        </div>
                                    @elseif($widget->key == 'language')
                                        <div class="h-100 d-flex align-items-center" @if (@$widget->background_color) style="background-color: {{ '#' . @$widget->background_color }} !important" @endif>
                                            @include($activeTemplate . 'partials.menu.language_menu')
                                        </div>
                                    @elseif($widget->key == 'notifications')
                                        <div class="h-100 d-flex align-items-center" @if (@$widget->background_color) style="background-color: {{ '#' . @$widget->background_color }} !important" @endif>
                                            <x-user-notification-component />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif


@push('style')
    <style>
        .header-bottom {
            background-color: transparent;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .header-bottom:hover {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
        }

        .menu li a.active {
            background-color: #ffffff33;
        }

        @media (max-width: 991px) {
            /* .header-bottom-wrapper {
                flex-direction: column !important;
                gap: 15px !important;
                margin-left: 15px !important;
            } */

            .view-category-wrapper {
                width: 100%;
                order: 1;
            }

            .view-category {
                width: 100%;
            }

            .menu-category-btn {
                width: 100%;
                padding: 12px 15px !important;
            }

            .category-dropdown-menu {
                position: static !important;
                display: block !important;
                width: 100% !important;
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
                max-height: 300px;
                overflow-y: auto;
            }

            .menu {
                flex-direction: row !important;
                gap: 0 !important;
                order: 2;
            }

            .menu li {
                width: 100%;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .menu li a {
                padding: 12px 15px !important;
                display: block !important;
            }

            .action-btn-inner {
                flex-wrap: wrap !important;
                gap: 10px !important;
                order: 3;
                width: 100%;
            }

            .action-btn-inner > div {
                flex: 1 1 calc(50% - 5px) !important;
                min-width: 120px;
            }

            .primary-menu-button {
                order: -1;
                margin-right: auto;
            }
        }
    </style>
@endpush
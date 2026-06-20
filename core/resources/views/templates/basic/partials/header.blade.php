 @php
     $headers = App\Models\Frontend::where('data_keys', 'headers.order.content')->first()->data_values;
     $headerThree = App\Models\Frontend::where('data_keys', 'header_three.content')->first()?->data_values;
     $siteMenu = $headerThree->group->links;
 @endphp


@push('style')
    <style>
        .header-area {
            background-color: transparent;
        }
    </style>
@endpush

 <div class="header-area">
     @foreach ($headers as $header)
     @include('Template::partials.headers.'.$header)
     @endforeach
 </div>

 <!-- @include('Template::partials.mobile_menu') -->

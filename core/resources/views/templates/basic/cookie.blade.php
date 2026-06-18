@extends($activeTemplate . 'layouts.master')

@section('content')
    <section class="py-60 cookie-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        echo $cookie->data_values->description;
                    @endphp
                </div>
            </div>
        </div>
    </section>

    <style>
        .cookie-page,
        .cookie-page *,
        .cookie-page p,
        .cookie-page span,
        .cookie-page li,
        .cookie-page h1,
        .cookie-page h2,
        .cookie-page h3,
        .cookie-page h4,
        .cookie-page h5,
        .cookie-page h6,
        .cookie-page a {
            color: #fff !important;
        }
    </style>
@endsection
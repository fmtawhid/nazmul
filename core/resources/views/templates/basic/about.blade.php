

@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="">
        @if (@$sections->secs != null)
            @foreach (json_decode($sections->secs) as $sec)
                @include('Template::sections.' . $sec)
            @endforeach
        @endif
    </div>
@endsection

@extends('scalar::layout')

@section('content')
    <script id="api-reference" data-url="{{ Scalar::url() }}"></script>

    <script>
        document.getElementById('api-reference').dataset.configuration =
            JSON.stringify({!! Scalar::configuration() !!})
    </script>

    <script src="{{ Scalar::cdn() }}"></script>
@endsection

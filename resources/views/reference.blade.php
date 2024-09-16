@extends('scalar::layout')

@section('content')
    <script id="api-reference" data-url="{{ \Scalar\Scalar::url() }}"></script>

    <script>
        document.getElementById('api-reference').dataset.configuration =
            JSON.stringify({!! \Scalar\Scalar::configuration() !!})
    </script>

    <script src="{{ \Scalar\Scalar::cdn() }}"></script>
@endsection

@extends('scalar::layout')

@section('content')
    <div id="app"></div>

    <script src="{{ \Scalar\Facades\Scalar::cdn() }}"></script>

    <script>
       Scalar.createApiReference('#app', {!! \Scalar\Facades\Scalar::configuration() !!})
    </script>
@endsection

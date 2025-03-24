@extends('scalar::layout')

@section('content')
    <div id="app"></div>

    <script src="{{ \Scalar\Scalar::cdn() }}"></script>

    <script>
       Scalar.createApiReference('#app', {!! \Scalar\Scalar::configuration() !!})
    </script>
@endsection

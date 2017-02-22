@extends('layouts.app')
@section('content')
<div class="mr-root">
    <div id="navigation"></div>
    @yield('main')
</div>
@endsection

{{--@push('scripts')--}}
{{--<script src="{{ asset('js/navigation.js') }}"></script>--}}
{{--@endpush--}}
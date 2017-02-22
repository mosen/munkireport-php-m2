@extends('layouts.navigation')
@section('title', 'Dashboard')

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endpush

@section('main')
<div id="root"></div>
@endsection


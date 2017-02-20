@extends('layouts.app')
@section('title', 'ARD Listing')
@push('scripts')
    <script src="/js/ard-bundle.js" type="text/javascript" />
@endpush
@section('content')
<div id="table"></div>
@endsection

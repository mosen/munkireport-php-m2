@extends('layouts.app')
@section('title', 'ARD Listing')
@push('scripts')
<script src="{{ asset('x/ard/listing.js') }}" type="application/javascript"></script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Apple Remote Desktop Report
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection

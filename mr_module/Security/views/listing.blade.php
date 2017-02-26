@extends('layouts.navigation')
@section('title', 'Security Listing')
@push('scripts')
<script src="{{ asset('js/x/security/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/security/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/security/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Security Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.navigation')
@section('title', 'Client Listing')
@push('scripts')
<script src="{{ asset('js/client/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/client/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/client/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                nav.reports.client
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection

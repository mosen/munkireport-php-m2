@extends('layouts.navigation')
@section('title', 'Network Listing')
@push('scripts')
<script src="{{ asset('js/x/network/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/network/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/network/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Network Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.navigation')
@section('title', 'Display Listing')
@push('scripts')
<script src="{{ asset('js/x/display/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/display/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/display/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Display Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection

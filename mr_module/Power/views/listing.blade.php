@extends('layouts.navigation')
@section('title', 'Power Listing')
@push('scripts')
<script src="{{ asset('js/x/power/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/power/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/power/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Power Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
